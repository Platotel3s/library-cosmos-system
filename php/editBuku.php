<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
if (session_status()===PHP_SESSION_NONE) {
  session_start();
}
$connectingFile=null;
$pathPossible=[
  __DIR__."/../connect.php",
  __DIR__."/../../connect.php",
  __DIR__."/./connect.php"
];
foreach ($pathPossible as $path) {
  if (file_exists($path)) {
    $connectingFile=$path;
  }
}
require $connectingFile;
if (!isset($_GET['id'])) {
  echo "<script>alert('ID tidak terbaca');</script>";
}
$id=intval($_GET['id']);

$query='select*from buku where id=?';
$stmt=$koneksi->prepare($query);
$stmt->bind_param('i',$id);
$stmt->execute();
$buku=$stmt->get_result()->fetch_assoc();
if (!$buku) {
  die('Data tidak ditemukan');
}
$penulis=mysqli_query($koneksi,"select*from penulis");
$penerbit=mysqli_query($koneksi,"select*from penerbit");
$genre=mysqli_query($koneksi,"select*from genre");
$tahun=mysqli_query($koneksi,"select*from tahun");

