<link rel="stylesheet" href="../../css/createBook.css">
<div class="container">
  <form action="../../php/createBook.php" method="post" class="form-book">
    <label for="judul">Judul Buku:</label>
    <input type="text" id="judul" name="judul" required>

    <label for="penulis">Penulis:</label>
    <select id="penulis" name="id_penulis" required>
      <?php
        include "../../connect.php";
        $sql = "SELECT * FROM penulis";
        $result = mysqli_query($koneksi, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='" . $row['id'] . "'>" . $row['namaPenulis'] . "</option>";
        }
      ?>
    </select>

    <label for="penerbit">Penerbit:</label>
    <select id="penerbit" name="id_penerbit" required>
      <?php
        $sql = "SELECT * FROM penerbit";
        $result = mysqli_query($koneksi, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='" . $row['id'] . "'>" . $row['namaPenerbit'] . "</option>";
        }
      ?>
    </select>

    <label for="genre">Genre:</label>
    <select id="genre" name="id_genre" required>
      <?php
        $sql = "SELECT * FROM genre";
        $result = mysqli_query($koneksi, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='" . $row['id'] . "'>" . $row['namaGenre'] . "</option>";
        }
      ?>
    </select>

    <label for="tahun">Tahun Terbit:</label>
    <select id="tahun" name="id_tahun" required>
      <?php
        $sql = "SELECT * FROM tahun";
        $result = mysqli_query($koneksi, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='" . $row['id'] . "'>" . $row['tahun'] . "</option>";
        }
      ?>
      </select>
    <button type="submit" class="submit">Tambah Buku</button>
  </form>
</div>
