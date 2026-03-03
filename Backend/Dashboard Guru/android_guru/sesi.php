<?php include 'koneksi.php';?>
<?php include 'header.php';?>
<?php     

    if (!isset($_SESSION['guru']) or empty($_SESSION['guru'])) {
    echo "<script>alert('Anda harus login terlebih dahulu')</script>";
    echo "<script>location='login.php';</script>";
    exit();
    } 

    $nik = $_SESSION['guru']['nik_guru'];
    $kelas = array();
    $ambil = $koneksi->query("SELECT * FROM kelas WHERE nik_guru = '$nik' ");
    while($tiap = $ambil->fetch_assoc())
    {
        $kelas[] = $tiap;
    }

    $ke = isset($_GET['ke'])&&!empty($_GET['ke']) ?
    $_GET['ke']:"";
    $id_kelas = isset($_GET['id_kelas'])&&!empty($_GET['id_kelas']) ? $_GET['id_kelas']:"";

?>
<section class="py-5">
<div class="container">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h6>Tambah Sesi Presensi</h6>
            <form method="post">
                <div class="mb-3">
                    <label>Kelas</label>
                    <select class="form-control form-select" name="kode_kelas">
                        <option value="">Pilih</option>
                        <?php foreach ($kelas as $key => $value): ?>
                            <option value="<?php echo $value['kode_kelas'] ?>"
                                <?php echo $value['id_kelas'] == $id_kelas ? "selected":""?> >
                                <?php echo $value['nama_mapel'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Sesi Ke</label>
                    <input type="number" min="1" max="30" name="ke_sesi" value="<?php echo $ke?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Materi</label>
                    <input type="text" name="materi_sesi" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Bahasan</label>
                    <textarea class="form-control" name="bahasan_sesi"></textarea>
                </div>
                <button class="btn btn-primary" name="kirim">Kirim</button>
            </form>
        </div>
    </div>
</div>
</section>

<?php
if (isset($_POST["kirim"])) {
    $kode_kelas    = $_POST['kode_kelas'];
    $ke_sesi       = $_POST['ke_sesi'];
    $materi_sesi   = $_POST['materi_sesi'];
    $bahasan_sesi  = $_POST['bahasan_sesi'];
    $kode_sesi     = generateRandomString(5);

    //simpan sesi
    $koneksi->query("INSERT INTO sesi (kode_kelas,materi_sesi,bahasan_sesi,kode_sesi,ke_sesi)
        VALUES ('$kode_kelas','$materi_sesi','$bahasan_sesi','$kode_sesi','$ke_sesi') ");

    //dapatkan id_sesi barusan
    $id_sesi = $koneksi->insert_id;

    echo "<script>alert('silahkan presensi')</script>";
    echo "<script>location='presensi.php?id_sesi=$id_sesi'</script>";
}
?>

<?php include 'footer.php'; ?>