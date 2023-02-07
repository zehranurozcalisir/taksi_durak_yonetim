<?php  
include("baglanti.php");
session_start();
if($baglan){
if($_POST["tc_no"]){
    $tc_no=strip_tags(trim($_POST["tc_no"]));
}else{
    echo "Tc No Gelmedi";
}

$taksiSorgu=mysqli_query($baglan, "SELECT * FROM sofor WHERE s_tc_no='".$tc_no."'");
    if(mysqli_num_rows($taksiSorgu)>0)
    {
        $row=$taksiSorgu->fetch_array(MYSQLI_ASSOC);
        $_SESSION['tc_no']=$row['tc_no'];

        header("Location:yonetimPaneli.php");
        
    }else{
        header("Location:randevu.php");
    }
}
else{
    die("baglanti saglanmadı");
}
?>