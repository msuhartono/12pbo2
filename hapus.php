<?php 

require 'database.php';

$Koneksi = new Koneksi();

$id = $_GET['id'];
$Koneksi->hapusData($id);
header("Location: tampil.php");

?>