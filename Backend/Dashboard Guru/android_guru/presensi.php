<?php
include 'koneksi.php';
include 'header.php';

$id_sesi = $_GET['id_sesi'];
?>

<section py-5>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body letak-qrcode">

                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-toggle="modal" data-target="#exampleModal">
                    Gagalkan Presensi
                </button>
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6>Siswa</h6>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gagalkan Presensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <label for="">NIS</label>
                    <input type="text" name="nis" class="form-control">
                    <button class="btn btn-danger mt-2" name="gagalkan">Gagalkan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['gagalkan'])) {
    $nis = $_POST['nis'];
    $cek = $koneksi->query("SELECT * FROM presensi WHERE id_sesi='$id_sesi' AND nis='$nis'");

    if ($cek->num_rows == 0) {
        echo "<script>alert('Presensi tidak ditemukan')</script>";
    } else {
        $koneksi->query("DELETE FROM presensi WHERE id_sesi='$id_sesi' AND nis='$nis'");
        echo "<script>alert('Presensi berhasil dibatalkan')</script>";
    }
}
?>
<?php include 'footer.php' ?>
<script>
    function presensi_qr() {
        $.ajax({
            type: "get",
            url: "presensi_qr.php?id_sesi=<?php echo $id_sesi ?>",
            success: function (hasil_qr) {
                $(".letak-qrcode").html(hasil_qr);
            }
        })
    }

    function presensi_peserta() {
        $.ajax({
            type: "get",
            url: "presensi_peserta.php?id_sesi=<?php echo $id_sesi ?>",
            success: function (hasil_peserta) {
                $("tbody").html(hasil_peserta);
            }
        })
    }

    presensi_qr();
    presensi_peserta();

    setInterval(function () {
        presensi_qr();
    }, 5000);

    setInterval(function () {
        presensi_peserta();
    }, 1000);
</script>