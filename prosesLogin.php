<?php
include_once 'koneksi.php';
//ambil inputan user
$username = $_POST['username'];
$password = md5($_POST['password']);

//cek, apakah ada akun ini di Database
$pengguna = mysqli_query($mysqli, "select * from pengguna where username='$username' and password='$password'");
$check = mysqli_num_rows($pengguna);

//jika nilai 1=ada; 0=tidak ada
if($check==1){
    //diarahkan ke halaman utama
    $data = mysqli_fetch_array($pengguna);
    
    //set session
    session_start();
    $_SESSION['islogin'] = true;
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['username'] = $data['username'];
    
    //arahkan ke halama index.php
    header("location:dashboard.php");
}else{
    //kembali ke halaman login lagi
    header("location:login.php");
}