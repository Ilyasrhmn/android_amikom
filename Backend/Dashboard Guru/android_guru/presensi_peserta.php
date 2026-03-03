<?php 
include 'koneksi.php';
$id_sesi = $_GET['id_sesi'];

$presensi = array();
$ambil= $koneksi ->query("SELECT * FROM presensi 
    LEFT JOIN siswa ON presensi.nis=siswa.nis
    WHERE id_sesi = '$id_sesi'");
while($tiap = $ambil->fetch_assoc()){
    $presensi[] = $tiap;
}
?>

<?php foreach ($presensi as $key => $value): ?>
    <tr>
        <td><?php echo $key+1 ?></td>
        <td><?php echo $value['nis'] ?></td> 
        <td><?php echo $value['nama_siswa'] ?></td>
        <td><?php echo $value['waktu'] ?></td>
</tr>
<?php endforeach ?>