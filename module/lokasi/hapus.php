<?php
  include '../../vendor/autoload.php';
  include '../../fungsi/koneksi.php';
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $cari = @$_GET['cari'];
      $halaman = @$_GET['halaman'];
      $query = mysqli_query($con, "SELECT kode
                               FROM lokasi
                               WHERE kode='$id'");
      $jumlah = mysqli_num_rows($query);
      if ($jumlah > 0) {
          mysqli_query($con, "DELETE FROM lokasi
                          WHERE kode='$id'");
          header('location:../../index.php?menu=lokasi&halaman='.$halaman.'&cari='.$cari);
      } else {
          echo 'Maaf, Id tidak ditemukan';
      }
  }
