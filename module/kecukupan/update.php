<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $kode = $_POST['kode'];
    $tanggal = $_POST['tanggal'];
    $energi = $_POST['energi'];
    $protein = $_POST['protein'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
    $query = mysqli_query($con, "SELECT kode
                             FROM kecukupan
                             WHERE kode='$kode'");
    $jumlah = mysqli_num_rows($query);
    if ($jumlah > 0) {
        mysqli_query($con, "UPDATE kecukupan
                        SET tanggal='$tanggal',
                            energi='$energi',
                            protein='$protein'
                        WHERE kode='$kode'");
        header('location:../../index.php?menu=kecukupan&halaman='.$halaman.'&cari='.$cari);
    } else {
        echo 'Kode yang Di Update Tidak Ada';
    }
}
