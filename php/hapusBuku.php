<?php
// hapusBuku.php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
if (session_status()===PHP_SESSION_NONE) {
  session_start();
}
echo "Direktori aktif : ".__DIR__."<br>";
$possiblePaths=[
  __DIR__."/../connect.php",
  __DIR__."/../../connect.php",
  __DIR__."./connect.php",
];
$connectFile=null;
foreach ($possiblePaths as $path) {
  echo "Checking : $path<br>";
  if (file_exists($path)) {
    $connectFile=$path;
  }
}
if (!$connectFile) {
  die("File connect.php/dsb tidak ditemukan");
}
require_once $connectFile;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "delete from buku where id=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        echo "<script>alert('Berhasil menghapus buku');window.location.href='/pages/books/index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus');window.location.href='/pages/books/index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan');window.location.href='index.php';</script>";
}
