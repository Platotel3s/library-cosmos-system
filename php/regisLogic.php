<?php
require_once __DIR__ . "/../connect.php";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $name=trim($_POST["name"]);
    $email=trim($_POST["email"]);
    $address=trim($_POST["address"]);
    $phone=trim($_POST["phone"]);
    $gender=$_POST["gender"];
    $password=$_POST["password"];
    $confirmPassword=$_POST["confirmPassword"];

    if (empty($name)||empty($email)||empty($address)||empty($phone)||empty($gender)||empty($password)||empty($confirmPassword)) {
        echo "<script>alert('Data wajib diisi');history.back();</script>";
        exit;
    }

    if ($password!==$confirmPassword) {
        echo "<script>alert('Password tidak sama');history.back();</script>";
        exit;
    }

    $cekEmail=$koneksi->prepare("select id from users where email=?");
    $cekEmail->bind_param("s",$email);
    $cekEmail->execute();
    $cekEmail->store_result();

    if ($cekEmail->num_rows > 0) {
        echo "<script>alert('Email sudah ada');history.back();</script>";
        exit;
    }

    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);

    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $targetDir="../img/fotoProfil/";
        $ambilNamaFile=basename($_FILES["photo"]["name"]);
        $ekstensiFoto=pathinfo($ambilNamaFile,PATHINFO_EXTENSION);
        $namingFile=date('YmdHis').'.'.$ekstensiFoto;
        $targetFilePath=$targetDir.$namingFile;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
            $query="INSERT INTO users (name,email,password,address,phone,gender,photo) VALUES (?,?,?,?,?,?,?)";
            $stmt=$koneksi->prepare($query);
            $stmt->bind_param("sssssss",$name,$email,$hashedPassword,$address,$phone,$gender,$namingFile);

            if ($stmt->execute()) {
                header("Location: ../pages/login.php");
                exit;
            } else {
                echo "<script>alert('Registrasi gagal');history.back();</script>";
                exit;
            }
        } else {
            echo "<script>alert('Gagal mengunggah foto');history.back();</script>";
            exit;
        }
    } else {
        echo "<script>alert('Tidak ada foto yang diunggah');history.back();</script>";
        exit;
    }
}
?>
