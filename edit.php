<?php

require 'fungsi.php';
$Koneksi = new Koneksi();

$id = $_GET['id'];

$data = $Koneksi->tampil("SELECT * FROM siswaa WHERE id = $id")[0];

if (isset($_POST['edit'])) {
  if ($Koneksi->edit($_POST) > 0) {
    echo "<script>
            alert('Data berhasil diubah');
            document.location.href = 'tampil.php';
          </script>";
  } else {
    echo "<script>
            alert('Data gagal diubah');
            document.location.href = 'tampil.php';
          </script>";
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data</title>
</head>

<body>

  <form action="" method="post">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <div class="nama">
      <label for="nama">Nama</label>
      <input name="nama" type="text" value="<?= $data['nama'] ?>">
    </div>
    <div class="kelas">
      <label for="kelas">Kelas</label>
      <input name="kelas" type="text" value="<?= $data['kelas'] ?>">
    </div>
    <div class="jurusan">
      <label for="jurusan">Jurusan</label>
      <input name="jurusan" type="text" value="<?= $data['jurusan'] ?>">
    </div>
    <div class="submit">
      <button name="editt" type="submit">Edit</button>
    </div>
  </form>

</body>

</html>