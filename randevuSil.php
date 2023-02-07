<?php
include ("baglanti.php");
session_start();
$randevuId=$_POST["randevuId"];

if($baglan->query("DELETE FROM `randevu` WHERE `randevu`.`r_id` = $randevuId")) {
    header("location:randevu.php"); 
}



?>