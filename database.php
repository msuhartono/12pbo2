<?php

class Koneks
{
  private $username = 'root',
    $password = '',
    $host = 'localhost',
    $database = 'pbo',
    $conn,
    $stmt;

  public function __construct()
  {
    try {
      $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function tampilData($sql)
  {
    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->execute();
    $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function tambahData($data)
  {
    $nama = $data['nama'];
    $kelas = $data['kelas'];
    $jurusan = $data['jurusan'];
    $sql = "INSERT INTO siswa VALUES ('', '$nama','$kelas','$jurusan')";

    $this->stmt = $this->conn->prepare($sql);
    $result = $this->stmt->execute();
    return $result;
  }

  public function editData($data)
  {
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $sql = "UPDATE siswa SET nama = '$nama', kelas = '$kelas', jurusan = '$jurusan' WHERE id = $id";

    $this->stmt = $this->conn->prepare($sql);
    $result = $this->stmt->execute();
    return $result;
  }

  public function hapusData($id)
  {
    $sql = "DELETE FROM siswa WHERE id = $id";

    $this->stmt = $this->conn->prepare($sql);
    $this->stmt->execute();
  }

  public function cariData($keyword)
  {
    $this->stmt = $this->conn->prepare("SELECT * FROM siswa WHERE nama LIKE '%$keyword%' OR kelas LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'");
    $this->stmt->execute();
    $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}
