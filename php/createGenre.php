<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
if (session_status()===PHP_SESSION_NONE) {
  session_start();
}
echo "Saat ini sedang di direktori ".__DIR__."<br>";
$possiblePaths=[
  __DIR__."/../connect.php",
  __DIR__."/../../connect.php",
  __DIR__."/./connect",
];
$connectFile=null;
foreach ($possiblePaths as $path) {
  echo "Checking : $path<br>";
  if (file_exists($path)) {
    $connectFile=$path;
  }
}
if (!$connectFile) {
  die('File connect.php/dsb tidak ada');
}
require_once $connectFile;
if ($_SERVER["REQUEST_METHOD"]==="POST") {
  $namaGenre=trim($_POST["namaGenre"]);
  if(empty($namaGenre)) {
    echo "<script>alert('nama genre harus diisi');history.back();</script";
  }else{
    $query="insert into genre (namaGenre) values (?)";
    if ($stmt=$koneksi->prepare($query)) {
      $stmt->bind_param('s',$namaGenre);
      if ($stmt->execute()) {
        echo "<script>alert('Berhasil menambah $namaGenre');history.back();</script>";
      }else{
        echo "<script>Gagal menambah buku karena". $koneksi->error."</script>";
      }
      $stmt->close();
    }else{
      echo "<script>alert('Gagal karena ".$koneksi->error."');history.back();</script>";
    }
    $stmt->close();
  }
}else{
  echo "<script>alert('Invalid REQUEST METHOD');history.back();</script>";
}
