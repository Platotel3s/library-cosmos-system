<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
if (session_status()===PHP_SESSION_NONE) {
  session_start();
}
echo "Direktori saat ini sedang berada di : ".__DIR__."<br>";
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
    echo "File connect.php berada di $path<br>";
    break;
  }
}
if (!$connectFile) {
  die('File koneksi tidak ditemukan');
}
require_once $connectFile;
if ($_SERVER["REQUEST_METHOD"]=="POST") {
  $namaPenerbit=trim($_POST["namaPenerbit"] ?? '');
  if (empty($namaPenerbit)) {
    echo "<script>alert('nama penerbit harus ada');history.back();</script>";
  }else{
    $query="insert into penerbit (namaPenerbit) values (?)";
    if ($stmt=$koneksi->prepare($query)) {
      $stmt->bind_param('s',$namaPenerbit);
      if ($stmt->execute()) {
        echo "<script>alert('Berhasil menambah penerbit');window.location.href='/pages/books/index.php';</script>";
      }else{
        echo "<script>alert('Gagal menambah buku karena : ".$koneksi->error."')</script>";
      }
      $stmt->close();
    }else{
      echo "<script>alert('Error : ".$koneksi->error."');</script>";
    }
    $koneksi->close();
  }
}else{
  echo "<script>alert('Invalid REQUEST METHOD');history.back();</script>";
}
