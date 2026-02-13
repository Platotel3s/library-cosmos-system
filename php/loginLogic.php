<?php
require_once __DIR__ . "/../connect.php";
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $email=trim($_POST["email"]);
    $password=$_POST["password"];

    if (empty($email)||empty($password)) {
        echo "<script>alert('Email dan password wajib diisi');history.back();</script>";
        exit;
    }

    $query="SELECT * FROM users WHERE email=?";
    $stmt=$koneksi->prepare($query);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result=$stmt->get_result();

    if ($result->num_rows > 0) {
        $user=$result->fetch_assoc();
        if (password_verify($password,$user["password"])) {
            session_start();
            $_SESSION["user_id"]=$user["id"];
            $_SESSION["user_name"]=$user["name"];
            $_SESSION["user_email"]=$user["email"];
            header("Location: ../pages/dashboard.php");
            exit;
        } else {
            echo "<script>alert('Password salah');history.back();</script>";
            exit;
        }
    } else {
        echo "<script>alert('Email tidak ditemukan');history.back();</script>";
        exit;
    }
}
?>

