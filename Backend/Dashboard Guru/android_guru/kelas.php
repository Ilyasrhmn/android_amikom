<?php include 'koneksi.php';?>
<?php include 'header.php';?>
<?php //untuk proteksi halaman index.php
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
    $kode_kelas = $tiap['kode_kelas'];
    $sesi = array();

    $jupuk = $koneksi->query("SELECT * FROM sesi WHERE kode_kelas = '$kode_kelas' ");
    while($js = $jupuk->fetch_assoc())
    {
        $sesi[] = $js;
    }

    $ids = array_column($sesi,"id_sesi");

    $tiap['jumlah_sesi'] = count($sesi);
    $tiap['id_sesi_terakhir'] = end($ids);
    $tiap['sesi'] = $sesi;
    $kelas[] = $tiap;

}
?>

<section class="py-5">
    <div class="container">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6>Kelas</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kelas</th>
                            <th>Nama Mapel</th>
                            <th>NIK Guru</th>
                            <th>Nama Guru</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kelas as $key => $value): ?>
                        <tr?>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $value['kode_kelas']; ?></td>
                            <td><?php echo $value['nama_mapel']; ?></td>
                            <td><?php echo $value['nik_guru']; ?></td>
                            <td><?php echo $value['nama_guru']; ?></td>
                            <td><?php echo $value['tahun_ajaran']; ?></td>
                            <td><?php echo $value['semester']; ?></td>
                            <?php echo $value['jumlah_sesi'];?>
                            <td>
                                <a href="peserta.php?id_kelas=<?php echo $value['id_kelas']?>" class="btn btn-info btn-sm">Peserta</a>
                                <a href="" class="btn btn-success btn-sm">Rekap Presensi</a>

                                <a href="sesi.php?ke=<?php echo $value['jumlah_sesi']+1 ?>&id_kelas=<?php echo $value['id_kelas'] ?>
                                    "class = "btn btn-primary btn-sm"> Mulai Presensi</a>

                                    <?php if(!empty($value['id_sesi_terakhir'])) : ?>
                                        <a href="presensi.php?id_sesi=<?php echo $value['id_sesi_terakhir'] ?>"
                                        class="btn btn-info btn-sm">Lanjutkan Presensi</a>
                                        <?php endif ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <a href="kelas_tambah.php" class="btn btn-primary">Buat baru</a>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php';?>