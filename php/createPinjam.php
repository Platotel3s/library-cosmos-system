<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
echo "Current directory: " . __DIR__ . "<br>";
$possiblePaths = [
    __DIR__ . "/../connect.php",
    __DIR__ . "/../../connect.php",
    dirname(__DIR__) . "/connect.php",
];

$connectFile = null;
foreach ($possiblePaths as $path) {
    echo "Checking: $path<br>";
    if (file_exists($path)) {
        $connectFile = $path;
        echo "Found connect.php at: $path<br>";
        break;
    }
}

if (!$connectFile) {
    die("Error: Cannot find connect.php. Please check the file location.");
}

require_once $connectFile;
if ($_SERVER["REQUEST_METHOD"]==="POST") {
  $id_member=$_POST["id_member"] ?? '';
  $id_buku=$_POST["id_buku"] ?? '';
  $tanggalPinjam=date('Y-m-d-H-i-s');
  $tanggalKembali=trim($_POST["tanggalKembali"] ?? '');
  if (empty($id_member) || empty($id_buku)) {
    echo "<script>alert('Semua kolom harus diisi!'); window.history.back();</script>";
    exit;
  }else{
    $query="insert into pinjamBuku (id_member,id_buku,tanggalPinjam,tanggalKembali) values (?,?,?,?)";
    if ($stmt=$koneksi->prepare($query)) {
      $stmt->bind_param('iiss',$id_member,$id_buku,$tanggalPinjam,$tanggalKembali);
      if ($stmt->execute()) {
        echo "<script>alert('Peminjam berhasil ditambahkan!'); window.location.href = '/pages/pinjam/index.php';</script>"; 
      }else{
        echo "<script>alert('Gagal menambahkan Peminjam: " . $stmt->error . "'); window.history.back();</script>";
      }
      $stmt->close();
    }else{
      echo "<script>alert('Error preparing query: " . $koneksi->error . "'); window.history.back();</script>";
    }
  }
  $koneksi->close();
}else{
  echo "Invalid request method. Expected POST.";
}
