<?php

//hancurkan semua session
session_start();
unset($_SESSION['islogin']);

session_destroy();

//kembalikan ke halaman login
header("location:login.php");