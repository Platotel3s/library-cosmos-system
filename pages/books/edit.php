<?php
require "../../php/editBuku.php";

$title = 'Edit Buku';
$styles = '<link rel="stylesheet" href="../../css/editBuku.css">';
$scripts = '';

ob_start();
?>

<h1>Edit Buku</h1>

<form class="form-edit" action="../../php/updateBook.php" method="POST">
    
    <input type="hidden" name="id" value="<?= $buku['id'] ?>">

    <!-- Judul -->
    <label for="judul">Judul</label>
    <input type="text" 
           id="judul" 
           name="judul" 
           value="<?= htmlspecialchars($buku['judul']) ?>" 
           required>

    <!-- Penulis -->
    <label for="penulis">Penulis</label>
    <select name="id_penulis" id="penulis" required>
        <?php while($p = mysqli_fetch_assoc($penulis)): ?>
            <option value="<?= $p['id'] ?>"
                <?= $p['id'] == $buku['id_penulis'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($p['namaPenulis']) ?>
            </option>
        <?php endwhile; ?>
    </select>

    <!-- Penerbit -->
    <label for="penerbit">Penerbit</label>
    <select name="id_penerbit" id="penerbit" required>
        <?php while($pb = mysqli_fetch_assoc($penerbit)): ?>
            <option value="<?= $pb['id'] ?>"
                <?= $pb['id'] == $buku['id_penerbit'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($pb['namaPenerbit']) ?>
            </option>
        <?php endwhile; ?>
    </select>

    <!-- Genre -->
    <label for="genre">Genre</label>
    <select name="id_genre" id="genre" required>
        <?php while($g = mysqli_fetch_assoc($genre)): ?>
            <option value="<?= $g['id'] ?>"
                <?= $g['id'] == $buku['id_genre'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($g['namaGenre']) ?>
            </option>
        <?php endwhile; ?>
    </select>

    <!-- Tahun -->
    <label for="tahun">Tahun</label>
    <select name="id_tahun" id="tahun" required>
        <?php while($t = mysqli_fetch_assoc($tahun)): ?>
            <option value="<?= $t['id'] ?>"
                <?= $t['id'] == $buku['id_tahun'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($t['tahun']) ?>
            </option>
        <?php endwhile; ?>
    </select>

    <button type="submit" class="submit">Update</button>
</form>

<?php
$content = ob_get_clean();
include __DIR__ . "/../layouts/app.php";
?>

