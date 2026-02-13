<?php
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
  __DIR__."/./connect.php"
];
$connectFile=null;
foreach ($possiblePaths as $path) {
  echo "Checking : $path<br>";
  if (file_exists($path)) {
    $connectFile=$path;
    echo "File connect.php ditemukan di : $path<br>";
    break;
  }
}
if (!$connectFile) {
  die("Error: Tidak menemukan file connect.php");
}
require_once $connectFile;
if ($_SERVER["REQUEST_METHOD"]=="POST") {
  $namaPenulis=trim($_POST["namaPenulis"] ?? '');
  if (empty($namaPenulis)) {
    echo "<script>alert('nama penulis harus ada');history.back();</script>";
    exit;
  }else{
    $query="insert into penulis (namaPenulis) values (?)";
    if ($stmt=$koneksi->prepare($query)) {
      $stmt->bind_param('s',$namaPenulis);
      if ($stmt->execute()) {
        echo "<script>alert('Berhasil ditambah');window.location.href='/pages/books/index.php';</script>";
      }else{
        echo "<script>alert('Gagal menambahkan buku: " . $stmt->error . "'); window.history.back();</script>";
      }
      $stmt->close();
    }else{
      echo "<script>alert('Error : ".$koneksi->error."')</script>";
    }
    $koneksi->close();
  }
}else{
  echo "Invalid REQUEST METHOD";
}
