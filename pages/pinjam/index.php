<?php
require "../../php/indexPinjam.php";
$title = "Daftar Peminjam";
$styles = '<link rel="stylesheet" href="/css/indexPinjam.css">';
$scripts = '<script src="/js/indexPinjam.js"></script>';
ob_start();
?>
<h1>Daftar Peminjam</h1>
<button id="tambahPinjam">Tambah Pemimjam</button>
<table>
  <thead>
    <tr>
      <th>Nama Peminjam</th>
      <th>Buku Yang Dipinjam</th>
      <th>Tanggal Pinjam</th>
      <th>Tanggal Kembali</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
      <td><?= htmlspecialchars($row['nama_member']) ?></td>
      <td><?= htmlspecialchars($row['judul_buku']) ?></td>
      <td><?= htmlspecialchars($row['tanggalPinjam']) ?></td>
      <td><?= htmlspecialchars($row['tanggalKembali']) ?></td>
      <td class="action-buttons">
          <?php if ($row['status'] === 'dipinjam'): ?>
            <a href="/php/kembalikanBuku.php?id=<?= $row['id'] ?>"
              class="btn-return"
              onclick="return confirm('Tandai buku ini sudah dikembalikan?')">
              Dikembalikan
            </a>
          <?php else: ?>
            <span class="status-returned">✔ Sudah Kembali</span>
          <?php endif; ?>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<div class="modal-tambah-peminjam" id="modalTambahPinjam">
  <div class="modal-content">
    <span class="close">&times;</span> 
    <h2>Tambah Peminjam Baru</h2>
    <?php include "./create.php"; ?>
  </div>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . "/../layouts/app.php";
