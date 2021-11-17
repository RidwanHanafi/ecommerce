<?php
//Proteksi halaman admin = fungsi cek_login di Simple_login
$this->simple_login->cek_login();
//Gabugangn semua layut mjd satu
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');?>
