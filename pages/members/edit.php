<?php
require "../../php/editMember.php";
$title='Edit Buku';
$styles='<link rel="stylesheet" href="../../css/editMember.css">';
$scripts='';
ob_start();
?>
<h1>Edit Member</h1>
<form class="form-edit" action="../../php/editMember.php" method="POST">
  <input type="hidden" name="id" value="<?php $member['id'] ?>">
  
  <label for="nama">Nama Lengkap</label>
  <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($member['nama']) ?>">
  
  <label for="alamat">Alamat Tempat Tinggal</label>
  <input type="text" name="alamat" id="alamat" value="<?= htmlspecialchars($member['alamat']) ?>">

  <label for="handphone">No Handphone</label>
  <input type="text" name="handphone" id="handphone" value="<?= htmlspecialchars($member['handphone']) ?>">

  <label for="noKartuIdentitas">No Kartu Identitas</label>
  <input type="text" name="noKartuIdentitas" id="noKartuIdentitas" value="<?= htmlspecialchars($member['noKartuIdentitas']) ?>">

  <button type="submit" class="submit">Edit Profil</button>
</form>

<?php 
  $content=ob_get_clean();
  include __DIR__."/../layouts/app.php";
?>
