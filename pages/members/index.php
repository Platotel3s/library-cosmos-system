<?php
require "../../php/indexMembers.php"; 
$title="Daftar Member";
$styles='<link rel="stylesheet" href="/css/indexMember.css">';
$scripts='<script src="/js/indexMember.js"></script>';
ob_start();
?>
<h1>Daftar Member</h1>
<button id="tambahMember">Tambah Member</button>
<table>
  <thead>
    <tr>
      <th>Nama</th>
      <th>Alamat Rumah</th>
      <th>No Handphone</th>
      <th>No. Kartu Identitas</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row=mysqli_fetch_assoc($result)):?>
      <tr>
        <td><?php echo htmlspecialchars($row['nama']) ?></td>
        <td><?php echo htmlspecialchars($row['alamat']) ?></td>
        <td><?php echo htmlspecialchars($row['handphone']) ?></td>
        <td><?php echo htmlspecialchars($row['noKartuIdentitas']) ?></td>
        <td class="action-buttons">
          <a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">
            <i class="fas fa-edit"></i> Edit
          </a>
          <a href="/php/hapusMember.php?id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
            <i class="fas fa-trash"></i> Hapus
          </a>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<div id="modalTambahMember" class="modal-tambah-member">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Tambah member</h2>
    <?php include "./create.php"; ?>
  </div>
</div>
<?php
$content=ob_get_clean();
include __DIR__."/../layouts/app.php";
