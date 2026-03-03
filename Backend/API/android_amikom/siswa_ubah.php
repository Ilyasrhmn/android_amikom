<?php
if (isset($_POST['kode']) && $_POST['kode'] == 'ilyas3203') {
    include 'koneksi.php';

    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $password_siswa = $_POST['password_siswa'];

    $ambil = $db->query("SELECT * FROM siswa WHERE nis = '$nis' ");
    $siswa = $ambil->fetch_assoc();

    if (empty($siswa)) {
        $out['hasil'] = "gagal";
        $out['data'] = array();
    } else {

        if (isset($_POST['password_siswa']) && !empty($_POST['password_siswa'])){
            $password = sha1($_POST['password_siswa']);

            $db->query("UPDATE siswa SET nama_siswa = '$nama_siswa', password_siswa = '$password' WHERE nis = '$nis' ");
        } else {
            $db->query("UPDATE siswa SET nama_siswa = '$nama_siswa' WHERE nis = '$nis' ");
        }
        $out['hasil'] = "sukses";
        $out['data'] = $siswa;
    }
} else {
    $out['hasil'] = "gagal";
    $out['data'] = array();
}

echo json_encode($out);

?>