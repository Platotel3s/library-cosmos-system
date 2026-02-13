<?php
session_start();
if (!isset($_SESSION["user_id"])) {
  header("Location: ./login.php");
  exit;
}
require_once __DIR__ . "/../connect.php";
$stats=[];

$queryBuku="select count(*) as total from buku";
$hasilBuku=mysqli_query($koneksi,$queryBuku);
$stats['total_buku']=mysqli_fetch_assoc($hasilBuku)['total'];

$queryPinjamBuku="   SELECT COUNT(*) as total FROM pinjamBuku WHERE status = 'dipinjam'";
$hasilPinjamBuku=mysqli_query($koneksi,$queryPinjamBuku);
$stats['peminjaman_aktif']=mysqli_fetch_assoc($hasilPinjamBuku)['total'];

$queryMember="select count(*) as total from members";
$hasilMember=mysqli_query($koneksi,$queryMember);
$stats['jumlah_member']=mysqli_fetch_assoc($hasilMember)['total'];

$today=date('Y-m-d');
$queryToday="select count(*) as total from pinjamBuku where date(tanggalKembali) = '$today'";
$hasilToday=mysqli_query($koneksi,$queryToday);
$stats['kembali_hari_ini']=mysqli_fetch_assoc($hasilToday)['total'];

$queryBorrow="SELECT pb.*, m.nama as nama_member, b.judul as judul_buku 
          FROM pinjamBuku pb 
          JOIN members m ON pb.id_member = m.id 
          JOIN buku b ON pb.id_buku = b.id 
          ORDER BY pb.tanggalPinjam DESC 
          LIMIT 5";
$peminjamTerbaru=mysqli_query($koneksi,$queryBorrow);

$queryBukuPopuler="SELECT b.judul, COUNT(pb.id_buku) as jumlah_pinjam 
          FROM pinjamBuku pb 
          JOIN buku b ON pb.id_buku = b.id 
          GROUP BY pb.id_buku 
          ORDER BY jumlah_pinjam DESC 
          LIMIT 5";
$bukuPopuler=mysqli_query($koneksi,$queryBukuPopuler);
