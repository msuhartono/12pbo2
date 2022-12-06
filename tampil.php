<?php

require 'databasephp';
$Koneksi = new Koneksi():
$data = $Koneksi->tampilData("SELECT * FROM siswa");

if (isset($_POST['cari'])) {
  $keyword = $_POST['keyword'];
  $data = $Koneksi->cariData($keyword);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <a href="tambahphp">Tambah</a>

  <form action="" method="post">
    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian..." autocomplete="off">
    <button type="submit" name="cari">Cari</button>
  </form>

  <table>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Opsi</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($data as $d) { ?>
      <tr>
        <td>
          <?= $i; ?>
        </td>
        <td>
          <?= $d['nama']; ?>
        </td>
        <td>
        <td>
          <?= $d['jurusan']; ?>
        </td>
        <td>
          <a href="hapus.php?id=<?= $d["id"]; ?>">Hapus</a>
          <a href="edit.php?id=<?= $d["id"]; ?>">Edit</a>
        </td>
      </tr>
      <?php $i+; ?>
    <?php } ?>
  </table>

</body>

</html>