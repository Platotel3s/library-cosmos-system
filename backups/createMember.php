
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Member - Perpustakaan</title>
    <link rel="stylesheet" href="../../css/membersCreate.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>
                <i class="fas fa-book-open" style="font-family: 'Font Awesome 5 Free'; font-weight: 900;">📚</i>
                Sistem Perpustakaan Cosmos
            </h1>
            <div class="user-info">
                <div class="user-avatar">
                    <?php 
                        $name = $_SESSION["user_name"];
                        $initials = "";
                        $nameParts = explode(" ", $name);
                        foreach($nameParts as $part) {
                            $initials .= strtoupper(substr($part, 0, 1));
                        }
                        echo substr($initials, 0, 2);
                    ?>
                </div>
                <div class="user-details">
                    <h3><?php echo $_SESSION["user_name"]; ?></h3>
                    <p><?php echo $_SESSION["user_email"]; ?></p>
                </div>
            </div>
        </header>
        <nav class="nav-breadcrumb">
            <a href="../dashboard.php" class="breadcrumb-link">
                <i class="fas fa-home">🏠</i> Dashboard
            </a>
            <span class="breadcrumb-separator">›</span>
            <a href="index.php" class="breadcrumb-link">
                <i class="fas fa-users">👥</i> Anggota
            </a>
        </nav>
        <div class="alert-container">
            <?php if ($success): ?>
                <div class="alert alert-success">
                    <div class="alert-icon">✅</div>
                    <div class="alert-content">
                        <strong>Berhasil!</strong> Member baru telah ditambahkan ke sistem.
                        <div style="margin-top: 8px; font-size: 14px;">
                            <a href="create.php" style="color: #155724; text-decoration: underline;">Tambah member lagi</a> atau 
                            <a href="index.php" style="color: #155724; text-decoration: underline;">lihat daftar anggota</a>
                        </div>
                    </div>
                </div>
            <?php elseif ($error): ?>
                <div class="alert alert-error">
                    <div class="alert-icon">❌</div>
                    <div class="alert-content">
                        <strong>Error!</strong> <?php echo $error; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-container">
            <form id="memberForm" method="POST" action="../../php/createMember.php">
                <div class="form-grid">
                    <div class="form-group" id="nama-group">
                        <label class="form-label">
                            Nama Lengkap 
                        </label>
                        <input type="text" 
                               class="form-input" 
                               id="nama" 
                               name="nama" 
                               value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>"
                               placeholder="Masukkan nama lengkap"
                               autofocus>
                        <span class="form-hint">Minimal 3 karakter, gunakan nama asli</span>
                        <span class="error-message" id="nama-error"></span>
                    </div>
                    <div class="form-group" id="handphone-group">
                        <label class="form-label">
                            No. Handphone 
                        </label>
                        <input type="text" 
                               class="form-input" 
                               id="handphone" 
                               name="handphone" 
                               value="<?php echo isset($_POST['handphone']) ? htmlspecialchars($_POST['handphone']) : ''; ?>"
                               placeholder="Contoh: 0812-3456-7890"
                               >
                        <span class="form-hint">10-15 digit angka, format: 08xx-xxxx-xxxx</span>
                        <span class="error-message" id="handphone-error"></span>
                    </div>
                </div>
                <div class="form-group" id="alamat-group">
                    <label class="form-label">
                        Alamat Lengkap 
                    </label>
                    <textarea class="form-input form-textarea" 
                              id="alamat" 
                              name="alamat" 
                              rows="4"
                              placeholder="Masukkan alamat lengkap (jalan, RT/RW, kelurahan, kecamatan, kota, kode pos)"
                              ><?php echo isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : ''; ?></textarea>
                    <span class="form-hint">Sertakan detail alamat untuk memudahkan verifikasi</span>
                    <span class="error-message" id="alamat-error"></span>
                </div>
                <div class="form-group" id="identitas-group">
                    <label class="form-label">
                        No. Kartu Identitas 
                    </label>
                    <input type="text" 
                           class="form-input" 
                           id="noKartuIdentitas" 
                           name="noKartuIdentitas" 
                           value="<?php echo isset($_POST['noKartuIdentitas']) ? htmlspecialchars($_POST['noKartuIdentitas']) : ''; ?>"
                           placeholder="Masukkan NIK KTP (16 digit) atau No. SIM"
                           >
                    <span class="form-hint">Harus unik dan belum terdaftar di sistem</span>
                    <span class="error-message" id="identitas-error"></span>
                </div>
                <div class="preview-section" id="previewSection">
                    <h3 class="preview-title">
                        <i class="fas fa-eye">👁️</i> Preview Data Member
                    </h3>
                    <div class="preview-grid">
                        <div class="preview-item">
                            <div class="preview-label">Nama Lengkap</div>
                            <div class="preview-value" id="previewNama">-</div>
                        </div>
                        <div class="preview-item">
                            <div class="preview-label">No. Handphone</div>
                            <div class="preview-value" id="previewHandphone">-</div>
                        </div>
                        <div class="preview-item">
                            <div class="preview-label">Alamat</div>
                            <div class="preview-value" id="previewAlamat">-</div>
                        </div>
                        <div class="preview-item">
                            <div class="preview-label">No. Identitas</div>
                            <div class="preview-value" id="previewIdentitas">-</div>
                        </div>
                    </div>
                </div>
                <div class="button-container">
                    <button type="submit" class="btn btn-success" id="submitBtn">
                        <span class="btn-icon">💾</span> Simpan Member
                    </button>
                    <button type="button" class="btn btn-primary" id="previewBtn">
                        <span class="btn-icon">👁️</span> Preview Data
                    </button>
                    <button type="reset" class="btn btn-outline" id="resetBtn">
                        <span class="btn-icon">🔄</span> Reset Form
                    </button>
                </div>
            </form>
        </div>
        <?php
        $recentQuery = "SELECT * FROM members ORDER BY createdAt DESC LIMIT 5";
        $recentResult = mysqli_query($conn, $recentQuery);
        
        if (mysqli_num_rows($recentResult) > 0):
        ?>
        <div class="recent-section">
            <h3 class="section-title">
                <i class="fas fa-history">🕒</i> Member Terbaru Ditambahkan
            </h3>
            <table class="recent-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>No. HP</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($member = mysqli_fetch_assoc($recentResult)): ?>
                    <tr>
                        <td><?php echo $member['id']; ?></td>
                        <td><?php echo htmlspecialchars($member['nama']); ?></td>
                        <td><?php echo htmlspecialchars($member['handphone']); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($member['createdAt'])); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
        <footer class="footer">
            <div class="copyright">
                &copy; <?php echo date('Y'); ?> Sistem Perpustakaan Cosmos. All rights reserved.
            </div>
            <a href="../php/logout.php" class="logout-btn">
                <i class="fas fa-sign-out-alt">🚪</i> Logout
            </a>
        </footer>
    </div>

    <script src="../../js/membersCreate.js"></script>
</body>
</html>
