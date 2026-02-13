<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="../../css/createBook.css">
</head>
<body>
    <a href="index.php">Daftar Buku</a>
    <br>
    <a href="../dashboard.php">Dashboard</a>
    <form id="tambah-buku">
        <label for="judul">Judul Buku:</label>
        <input type="text" id="judul" name="judul" required>

        <label for="penulis">Penulis:</label>
        <select id="penulis" name="penulis" required>
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
        <select id="penerbit" name="penerbit" required>
            <?php
            $sql = "SELECT * FROM penerbit";
            $result = mysqli_query($koneksi, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id'] . "'>" . $row['namaPenerbit'] . "</option>";
            }
            ?>
        </select>

        <label for="genre">Genre:</label>
        <select id="genre" name="genre" required>
            <?php
            $sql = "SELECT * FROM genre";
            $result = mysqli_query($koneksi, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id'] . "'>" . $row['namaGenre'] . "</option>";
            }
            ?>
        </select>

        <label for="tahun">Tahun Terbit:</label>
        <select id="tahun" name="tahun" required>
            <?php
            $sql = "SELECT * FROM tahun";
            $result = mysqli_query($koneksi, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id'] . "'>" . $row['tahun'] . "</option>";
            }
            ?>
        </select>

        <button type="submit">Tambah Buku</button>
    </form>

    <script>
        const form = document.getElementById('tambah-buku');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const judul = document.getElementById('judul').value;
            const penulis = document.getElementById('penulis').value;
            const penerbit = document.getElementById('penerbit').value;
            const genre = document.getElementById('genre').value;
            const tahun = document.getElementById('tahun').value;

            fetch('create.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    judul,
                    penulis,
                    penerbit,
                    genre,
                    tahun
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Buku berhasil ditambahkan');
                    window.location.href = 'index.php';
                } else {
                    alert('Gagal menambahkan buku');
                }
            })
            .catch(error => console.error(error));
        });
    </script>
</body>
</html>


