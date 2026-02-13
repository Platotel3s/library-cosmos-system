<?php
session_start();
require_once __DIR__ . "/../connect.php";

$sql = "
SELECT 
  b.id,
  b.judul,
  p.namaPenulis AS nama_penulis,
  pen.namaPenerbit AS nama_penerbit,
  g.namaGenre AS nama_genre,
  t.tahun AS tahun
FROM 
  buku b
  JOIN penulis p ON b.id_penulis = p.id
  JOIN penerbit pen ON b.id_penerbit = pen.id
  JOIN genre g ON b.id_genre = g.id
  JOIN tahun t ON b.id_tahun = t.id
";

$result = mysqli_query($koneksi, $sql);

if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}

