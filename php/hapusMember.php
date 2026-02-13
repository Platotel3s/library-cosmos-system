<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
if (session_status()===PHP_SESSION_NONE) {
  session_start();
}
$possiblePaths=[
  __DIR__."/../connect.php",
  __DIR__."/../../connect.php",
  __DIR__."./connect.php",
];
$connectFile=null;
foreach ($possiblePaths as $path) {
  if (file_exists($path)) {
    $connectFile=$path;
  }
}
if (!$connectFile) {
  echo "File tidak ada";
}
require_once $connectFile;

if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $sql='delete from members where id=?';
  $stmt=$koneksi->prepare($sql);
  $stmt->bind_param('i',$id);
  if ($stmt->execute()) {
      echo "<script>alert('Berhasil menghapus member');window.location.href='/pages/members/index.php';</script>";
  }else{
      echo "<script>alert('Gagal menghapus');window.location.href='/pages/members/index.php';</script>";
  }
}else{
    echo "<script>alert('ID tidak ditemukan');window.location.href='index.php';</script>";
}
