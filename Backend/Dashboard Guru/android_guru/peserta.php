<?php
include 'koneksi.php';

$id_kelas = $_GET['id_kelas'];

include 'vendor/autoload.php';

# Create a new Xls Reader
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

// Tell the reader to only read the data. Ignore formatting etc.
$reader->setReadDataOnly(true);

$peserta = array();
$ambil= $koneksi ->query("SELECT * FROM peserta 
    LEFT JOIN siswa ON peserta.nis=siswa.nis
    WHERE id_kelas = '$id_kelas' ");
while($tiap = $ambil->fetch_assoc()){
    $peserta[] = $tiap;
}
?>

<?php include 'header.php';
?>

<div class="container py-5">
    <div class="card">
        <div class="card-body">
            <h5>Daftar Peserta</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($peserta as $key => $value): ?>
                    <tr>
                        <td> <?php echo $key+1 ?> </td>
                        <td><?php echo $value ['nis'] ?></td>
                        <td><?php echo $value ['nama_siswa'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="card">
        <div class="card-body">
            <h5>Import Peserta</h5>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>File Excel peserta</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <button class="btn btn-primary" name="kirim">Kirim</button>
            </form>

        </div>
    </div>
</div>

<?php
if (isset($_POST['kirim'])) {
    $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
    $sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
    $data = $sheet->toArray();

    foreach ($data as $key => $persiswa) {
        $nis = $persiswa[0];
        $nama = $persiswa[1];
        $psw = sha1($nis);
        $foto = "default.jpg";

        // simpan ke tabel peserta
        $ambil = $koneksi->query("SELECT * FROM siswa WHERE nis='$nis' ");
        $cheksiswa = $ambil->fetch_assoc();
        if (empty($cheksiswa)) {
            $koneksi->query("INSERT INTO siswa (nis, nama_siswa, password_siswa, foto_siswa) 
            VALUES ('$nis', '$nama', '$psw', '$foto') ");
        }

        // Tambahkan AND id_kelas = '$id_kelas'
        $ambil = $koneksi->query("SELECT * FROM peserta WHERE nis='$nis' AND id_kelas='$id_kelas' ");
        $chekpeserta = $ambil->fetch_assoc();
        if (empty($chekpeserta)) {
            $koneksi->query("INSERT INTO peserta (nis, id_kelas) VALUES ('$nis', '$id_kelas') ");
        }
    }

    echo "<script>alert('Import peserta selesai')</script>";
    echo "<script>location='peserta.php?id_kelas=$id_kelas'</script>";
}
?>

<?php include 'footer.php';?>