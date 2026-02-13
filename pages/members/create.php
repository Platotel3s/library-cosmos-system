<link rel="stylesheet" href="../../css/membersCreate.css">
<div class="container">
  <form action="/../../php/createMember.php" method="post" class="form-member">
      <label for="nama">Nama Lengkap</label>
      <input type="text" id="nama" name="nama" required class="nama">
      
      <label for="alamat">Alamat rumah</label>
      <input type="text" name="alamat" id="alamat" class="alamat">
    
      <label for="handphone">No Handphone</label>
      <input type="text" name="handphone" id="handphone" class="handphone">

      <label for="noKartuIdentitas">Nomor Kartu Identitas</label>
      <input type="text" name="noKartuIdentitas" id="noKartuIdentitas" class="identitas">

      <div class="button">
          <button type="submit" class="submit">Tambah Member</button>
          <button type="reset" class="reset">Reset</button>
      </div>
  </form>
</div>
<script src="../../js/membersCreate.js"></script>
