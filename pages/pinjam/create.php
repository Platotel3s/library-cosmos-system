<?php
include "../../connect.php";
$buku=mysqli_query($koneksi,"select*from buku");
 ?>
<link rel="stylesheet" href="../../css/createPinjam.css">
<form action="../../php/createPinjam.php" method="POST" class="form-pinjam">
  <label for="id_member">Member</label>
  <select name="id_member" id="id_member" required>
    <?php
      include "../../connect.php"; 
      $member=mysqli_query($koneksi,"select*from members");
      while($m = mysqli_fetch_assoc($member)): ?>
      <option value="<?= $m['id']; ?>">
        <?= htmlspecialchars($m['nama']); ?>
      </option>
    <?php endwhile; ?>
  </select>

  <label for="id_buku">Buku</label>
  <select name="id_buku" id="id_buku" required>
    <?php while($b = mysqli_fetch_assoc($buku)): ?>
      <option value="<?= $b['id']; ?>">
        <?= htmlspecialchars($b['judul']); ?>
      </option>
    <?php endwhile; ?>
  </select>

  <label for="tanggalKembali">Tanggal Kembali</label>
  <input type="datetime-local" name="tanggalKembali" id="tanggalKembali">

  <div class="button">
    <button type="submit" class="submit">Tambah Peminjam</button>
    <button type="reset" class="reset">Reset</button>
  </div>

</form>

