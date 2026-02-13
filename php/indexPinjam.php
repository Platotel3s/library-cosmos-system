<?php
session_start();
require_once __DIR__."/../connect.php";

$sql="
SELECT 
  pb.id,
  pb.tanggalPinjam,
  pb.tanggalKembali,
  m.nama AS nama_member,
  b.judul AS judul_buku 
FROM 
  pinjamBuku pb 
  JOIN members m ON pb.id_member = m.id 
  JOIN buku b ON pb.id_buku = b.id
";
$result=mysqli_query($koneksi,$sql);
if (!$result) {
  die('Query Error : '.mysqli_error($koneksi));
}
