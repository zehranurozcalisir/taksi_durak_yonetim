<?php
include ("baglanti.php");
session_start();
$plaka=$_POST["plaka"];
$yolcu_kapasite=$_POST["yolcu_kapasite"];
$arac_tipi=$_POST["arac_tipi"];

if($baglan->query("INSERT INTO  arac (plaka,y_kapasite,b_tipi)  VALUES ('".$plaka."','".$yolcu_kapasite."','".$arac_tipi."')")) {
    header("location:tablolar.php"); 
}



?>