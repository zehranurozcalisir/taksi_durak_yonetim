<?php
include ("baglanti.php");
session_start();
$yolcu_tc=$_POST["yolcu_tc"];
$sofor_tc=$_POST["sofor_tc"];
$tarih=$_POST["tarih"];
$adres=$_POST["adres"];
$saat=$_POST["saat"];
$gun=$_POST["gun"];
if($baglan->query("INSERT INTO  randevu (r_tarih,r_saat,s_tc_id,gun_id,m_tc,adres)  VALUES ('".$tarih."','".$saat."','".$sofor_tc."','".$gun."','".$yolcu_tc."','".$adres."')")) {
    header("location:randevu.php"); 
}



?>