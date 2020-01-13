<div class="panel-heading">
    <h3 class="panel-title">
    Edit DKBM
    </h3>
</div>
<div class="panel-body">
<?php
include 'vendor/autoload.php';
include 'fungsi/koneksi.php';
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query = mysqli_query($con, "SELECT * FROM dkbm
                                 WHERE kode = '$id'");
      $jumlah = mysqli_num_rows($query);
      if ($jumlah > 0) {
          $a = mysqli_fetch_array($query); ?>


<form action="module/dkbm/update.php?halaman=<?php echo $_GET['halaman']; ?>&cari=<?php echo $_GET['cari']; ?>" method="POST"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="kode">Kode</label>
    <input type="text" class="form-control" name="kode" placeholder="Kode"
           value="<?php echo $a['kode'] ?>" readonly="readonly">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama"
           value="<?php echo $a['nama'] ?>">
  </div>
  <div class="form-group">
    <label for="lokasi">Jenis Pangan</label>
        <select name="jenis" class="form-control">
          <option value="">-- Pilih Data --</option>
          <?php
                $query = mysqli_query($con, 'SELECT * FROM jenispangan');
                while ($b = mysqli_fetch_array($query)) {
                    if ($b['kode'] == @$a['jenis']) {
                        echo "<option value='$b[kode]' selected>$b[kode] - $b[nama]</option>";
                    } else {
                        echo "<option value='$b[kode]'>$b[kode] - $b[nama]</option>";
                    }
                } ?>
        </select>
  </div>
  <button type="submit" class="btn btn-primary" name="kirim">Update</button>
</form>

 <?php

      } else {
          echo 'Maaf, Id yang di edit tidak ditemukan';
      }
  }
  ?>
</div>
