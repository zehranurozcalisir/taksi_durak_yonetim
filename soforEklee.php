<?php
include ("baglanti.php");
session_start();
$sofor_tc=$_POST["sofor_tc"];
$sofor_ad=$_POST["sofor_ad"];
$sofor_soyad=$_POST["sofor_soyad"];
$sofor_tel=$_POST["sofor_tel"];
$plaka_no=$_POST["plaka_no"];
if($baglan->query("INSERT INTO  sofor (s_tc_no,s_ad,s_soyad,s_tel_no,plaka)  VALUES ('".$sofor_tc."','".$sofor_ad."','".$sofor_soyad."','".$sofor_tel."','".$plaka_no."')")) {
    header("location:tablolar.php"); 
}
?>