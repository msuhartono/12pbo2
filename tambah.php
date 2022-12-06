<?php

require 'databasephp';

$Koneksi = new Koneksi();
if (isset($_POST['submit'])) {
  if ($Koneksi->tambahData($_POST) > 0) {
    echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'tampilphp';
          </script>";
  } else {
    echo "<script>
            alert('Data gagal ditambahkan');
            document.location.href = 'tampilphp';
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
  <title>Tambah Data</title>
</head>

<body>
  <form action="" method="post">
    <div class="nama">
      <label for="nama">Nama</label>
      <input name="nama" type="text">
    </div>
    <div class="kelas">
      <label for="kelas">Kelas</label>
      <input name="kelas" type="text">
    </div>
    <div class="jurusan">
      <label for="jurusan">Jurusan</label>
      <input name="jurusan" type="text">
    </div>
    <div class="submit">
      <button name="submitt" type="submit">Kirim</button>
    </div>
  </form>
</body>

</html>