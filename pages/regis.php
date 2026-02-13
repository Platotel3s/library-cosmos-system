<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form id="register-form" method="post" action="../php/regisLogic.php" enctype="multipart/form-data">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br><br>
            <label for="confirmPassword">Konfirmasi Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword"><br><br>
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="address"></textarea><br><br>
            <label for="nomor-handphone">Nomor Handphone:</label>
            <input type="text" id="nomor-handphone" name="phone"><br><br>
            <label for="jenis-kelamin">Jenis Kelamin:</label>
            <select id="jenis-kelamin" name="gender">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select><br><br>
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="photo"><br><br>
            <button type="submit">Register</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>

