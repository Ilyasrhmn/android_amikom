<?php
if (isset($_POST['kode']) && $_POST['kode'] == 'ilyas3203') {
    include 'koneksi.php';

    $pengumuman = array();

    $ambil = $db->query("SELECT * FROM pengumuman");
    while ($tiap = $ambil->fetch_assoc()) {
    $pengumuman[] = $tiap;
    }
    $out['hasil'] = "sukses";
    $out['data'] = $pengumuman;
}
else {
    $out['hasil'] = "gagal";
    $out['data'] = array();
}
echo json_encode($out);
?>