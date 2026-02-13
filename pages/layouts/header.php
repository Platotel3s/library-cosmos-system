<?php
function activeMenu($menuTitle, $title) {
    return str_contains($title, $menuTitle) ? 'active' : '';
}
?>

<link rel="stylesheet" href="../../css/header.css">
<header class="header">
    <div class="header-left">
        <h1><i class="fas fa-book-open"></i> Sistem Perpustakaan Cosmos</h1>
    </div>
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
<div class="nav-tabs">
<nav>
  <a class="<?= activeMenu('Dashboard', $title) ?>" href="/pages/dashboard.php">
    Dashboard
  </a>

  <a class="<?= activeMenu('Buku', $title) ?>" href="/pages/books/index.php">
    Buku
  </a>

  <a class="<?= activeMenu('Peminjaman', $title) ?>" href="/pages/pinjam/index.php">
    Peminjaman
  </a>

  <a class="<?= activeMenu('Member', $title) ?>" href="/pages/members/index.php">
    Tambah Member
  </a>
</nav>

</div>

