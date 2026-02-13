<?php
session_start();
require_once __DIR__."/../connect.php";
$sql="select*from members";
$result=mysqli_query($koneksi,$sql);
if (!$result) {
  die('Query error : '.mysqli_error($koneksi));
}
