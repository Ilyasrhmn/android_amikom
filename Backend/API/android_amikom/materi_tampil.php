<?php
if (isset($_POST['kode']) && $_POST['kode'] == 'ilyas3203') {
    include 'koneksi.php';
    $materi = array();

    $ambil = $db->query("SELECT * FROM materi Left Join kelas on materi.id_kelas=kelas.id_kelas");
    while ($tiap = $ambil->fetch_assoc()) {
    $materi[] = $tiap;
    }
    $out['hasil'] = "sukses";
    $out['data'] = $materi;
}
else {
    $out['hasil'] = "gagal";
    $out['data'] = array();
}
echo json_encode($out);
?>