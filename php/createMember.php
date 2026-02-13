<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
if (session_status()===PHP_SESSION_NONE) {
  session_start();
}
echo "Current directory : ".__DIR__."<br>";
$possiblePaths=[
  __DIR__."/../connect.php",
  __DIR__."/../connect.php",
  dirname(__DIR__)."/connect.php"
];
$connectFile=null;
foreach ($possiblePaths as $path) {
  echo "Checking : $path <br>";
  if (file_exists($path)) {
    $connectFile=$path;
    echo "connect.php ada di $path";
    break;
  }
}
if (!$connectFile) {
  die('Ga ada file connect.php');
}
require_once $connectFile;
if ($_SERVER["REQUEST_METHOD"]==="POST") {
  $nama=trim($_POST['nama']);
  $alamat=trim($_POST['alamat']);
  $handphone=trim($_POST['handphone']);
  $noKartuIdentitas=trim($_POST['noKartuIdentitas']);
  if (empty($nama||$alamt||$handphone||$noKartuIdentitas)) {
    echo "<script>alert('Form nama,alamat,no handphone dan nomor kartu identitas harus diisi');window.location.href='/pages/members/index.php'</script>";
  }else{
    $query='insert into members (nama,alamat,handphone,noKartuIdentitas) values (?,?,?,?)';
    if ($stmt=$koneksi->prepare($query)) {
      $stmt->bind_param('ssss',$nama,$alamat,$handphone,$noKartuIdentitas);
      if ($stmt->execute()) {
        echo "<script>alert('Berhasil menambah member');window.location.href='/pages/members/index.php'</script>";
      }else{
        echo "<script>alert('Gagal menambah member karena masalah ".$koneksi->error."')</script>";
      }
      $stmt->close();
    }else{
      echo "<script>alert('Gagal menambah member karena masalah ".$koneksi->error."')</script>"; 
    }
    $koneksi->close();
  }
}else{
  echo "<script>alert('INVALID REQUEST METHOD');history.back();</script>";
}

?>
