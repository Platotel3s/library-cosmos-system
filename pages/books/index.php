<?php
require "../../php/indexBook.php";

$title = "Daftar Buku";

$styles = '
<link rel="stylesheet" href="/css/indexBooks.css">
';

$scripts = '
<script src="/js/indexBook.js"></script>
';

ob_start();
?>

<h1>Daftar Buku</h1>
<button id="tambahBuku">Tambah Buku</button>
<button id="tambahPenulis">Tambah Penulis</button>
<button id="tambahPenerbit">Tambah Penerbit</button>
<button id="tambahGenre">Tambah Genre</button>
<table>
  <thead>
    <tr>
      <th>Judul</th>
      <th>Penulis</th>
      <th>Penerbit</th>
      <th>Genre</th>
      <th>Tahun</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?= htmlspecialchars($row['judul']) ?></td>
        <td><?= htmlspecialchars($row['nama_penulis']) ?></td>
        <td><?= htmlspecialchars($row['nama_penerbit']) ?></td>
        <td><?= htmlspecialchars($row['nama_genre']) ?></td>
        <td><?= htmlspecialchars($row['tahun']) ?></td>
        <td class="action-buttons">
          <a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">
            <i class="fas fa-edit"></i> Edit
          </a>
          <a href="/php/hapusBuku.php?id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
            <i class="fas fa-trash"></i> Hapus
          </a>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<div class="modal-tambah-buku" id="modalTambahBuku">
  <div class="modal-content">
    <span class="close">&times;</span> 
    <h2>Tambah Buku Baru</h2>
    <?php include "./create.php"; ?>
  </div>
</div>

<div id="modalTambahPenulis" class="modal-tambah-penulis">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Tambah Penulis</h2>
    <?php include "../penulis/create.php" ?>
  </div>
</div>

<div id="modalTambahPenerbit" class="modal-tambah-penerbit">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Tambah Penerbit</h2>
    <?php include "../penerbit/create.php" ?>
  </div>
</div>

<div id="modalTambahGenre" class="modal-tambah-genre">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Tambah Genre</h2>
    <?php include "../genres/create.php"; ?>
  </div>
</div>



<?php
$content = ob_get_clean();
include __DIR__ . "/../layouts/app.php";
