<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
echo "Current directory: " . __DIR__ . "<br>";
$possiblePaths = [
    __DIR__ . "/../connect.php",
    __DIR__ . "/../../connect.php",
    dirname(__DIR__) . "/connect.php",
];

$connectFile = null;
foreach ($possiblePaths as $path) {
    echo "Checking: $path<br>";
    if (file_exists($path)) {
        $connectFile = $path;
        echo "Found connect.php at: $path<br>";
        break;
    }
}

if (!$connectFile) {
    die("Error: Cannot find connect.php. Please check the file location.");
}

require_once $connectFile;
echo "connect.php loaded successfully!<br>";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $judul = trim($_POST["judul"] ?? '');
    $id_penulis = $_POST["id_penulis"] ?? '';
    $id_penerbit = $_POST["id_penerbit"] ?? '';
    $id_genre = $_POST["id_genre"] ?? '';
    $id_tahun = $_POST["id_tahun"] ?? '';
    if (empty($judul) || empty($id_penulis) || empty($id_penerbit) || empty($id_genre) || empty($id_tahun)) {
        echo "<script>alert('Semua kolom harus diisi!'); window.history.back();</script>";
        exit;
    }
    $query = "INSERT INTO buku (judul, id_penulis, id_penerbit, id_genre, id_tahun) VALUES (?, ?, ?, ?, ?)";
    if ($stmt = $koneksi->prepare($query)) {
        $stmt->bind_param("siiii", $judul, $id_penulis, $id_penerbit, $id_genre, $id_tahun);
        if ($stmt->execute()) {
            echo "<script>alert('Buku berhasil ditambahkan!'); window.location.href = '/pages/books/index.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan buku: " . $stmt->error . "'); window.history.back();</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Error preparing query: " . $koneksi->error . "'); window.history.back();</script>";
    }
    
    $koneksi->close();
} else {
    echo "Invalid request method. Expected POST.";
}
?>
