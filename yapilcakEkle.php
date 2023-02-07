<?php
include ("baglanti.php");
session_start();
$son_tarih=$_POST["son_tarih"];
$yapilacak_ad=$_POST["yapilacak_ad"];
if($baglan->query("INSERT INTO  yapilacaklar (son_tarih,yapilacak_ad)  VALUES ('".$son_tarih."','".$yapilacak_ad."')")) {
    header("location:yonetimPaneli.php"); 
}



?>