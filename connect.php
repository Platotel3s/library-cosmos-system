<?php

$hostname="localhost";
$username="avicero";
$database="cosmos";
$password="";

$koneksi=mysqli_connect($hostname,$username,$password,$database);

if (!$koneksi) {
    echo "Gagal menghubungkan ke database karena ".mysqli_connect_error();
}
