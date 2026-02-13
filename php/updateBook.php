
<?php
require_once __DIR__."/../connect.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request");
}

$id = intval($_POST['id']);
$judul = trim($_POST['judul']);
$id_penulis = intval($_POST['id_penulis']);
$id_penerbit = intval($_POST['id_penerbit']);
$id_genre = intval($_POST['id_genre']);
$id_tahun = intval($_POST['id_tahun']);

$query = "UPDATE buku 
          SET judul=?, id_penulis=?, id_penerbit=?, id_genre=?, id_tahun=? 
          WHERE id=?";

$stmt = $koneksi->prepare($query);
$stmt->bind_param("siiiii",
    $judul,
    $id_penulis,
    $id_penerbit,
    $id_genre,
    $id_tahun,
    $id
);

if ($stmt->execute()) {
    header("Location: ../pages/books/index.php");
    exit;
} else {
    echo "Gagal update: " . $koneksi->error;
}
