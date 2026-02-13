<?php
require "../php/dashboard.php";

$title = "Dashboard";

$styles = '
<link rel="stylesheet" href="../css/dashboard.css">
';

$scripts = '<script src="../js/dashboard.js"></script>';

ob_start();
?>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon icon-books">
            <i class="fas fa-book"></i>
        </div>
        <div class="stat-info">
            <h3><?php echo $stats['total_buku']; ?></h3>
            <p>Total Buku</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon icon-loan">
            <i class="fas fa-exchange-alt"></i>
        </div>
        <div class="stat-info">
            <h3><?php echo $stats['peminjaman_aktif']; ?></h3>
            <p>Peminjaman Aktif</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon icon-members">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-info">
            <h3><?php echo $stats['jumlah_member']; ?></h3>
            <p>Anggota Terdaftar</p>
        </div>
    </div>
        <div class="stat-card">
            <div class="stat-icon icon-return">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $stats['kembali_hari_ini']; ?></h3>
                    <p>Harus Kembali Hari Ini</p>
                </div>
            </div>
        </div>

<?php
$content = ob_get_clean();
include "./layouts/app.php";
?>
