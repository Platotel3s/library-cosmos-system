<!--app.php -->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "Sistem Perpustakaan" ?></title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <?= $styles ?? "" ?>
</head>
<body>

<div class="container">

    <?php include __DIR__ . "/header.php"; ?>

    <main>
        <?= $content ?>
    </main>

    <?php include __DIR__ . "/footer.php"; ?>

</div>

<?= $scripts ?? "" ?>

</body>
</html>

