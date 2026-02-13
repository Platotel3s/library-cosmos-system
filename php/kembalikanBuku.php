
<?php
require "../connect.php";

$id = $_GET['id'] ?? null;

if ($id) {

$stmt = $koneksi->prepare("
    UPDATE pinjamBuku
    SET status = 'dikembalikan',
        tanggalKembali = NOW(),
        updatedAt = NOW()
    WHERE id = ?
");


    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: /pages/pinjam/index.php");
exit;
