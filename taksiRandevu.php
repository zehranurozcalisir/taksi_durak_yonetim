<?php
include ("baglanti.php");
error_reporting(0);
session_start();
?>
<html> 
<head> 
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<title>HeyTaksi</title>
<link href="style.css" type="text/css" rel="stylesheet">
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<body > 
    <form action="giris.php" method="post">
<div class="kapsayici">
   <div class="orta">
       <div class="ortaust">
          <div> <img class="icon" src="logo.png"> </div>
           <div class="ortaustsag">
        
               <div class= "menu"><a href="giris.php">Çıkış Yap</a></div>
              </div>
        </div> </form>
       <div class="ortaalt">
         <div class="ortaaltust"> RANDEVU TAKİP</div>
           <div class="mapust">
               <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100140.85516177591!2d27.181798507834532!3d38.33968307111654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b96156867558c7%3A0xd2c0cf1972fe1f25!2zQnVjYS_EsHptaXI!5e0!3m2!1str!2str!4v1638866710417!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
           </div>
        <div class="randevuustsag">
         <div class="textboxsol">
            <form action="randevuEkle.php" method="post">
         
         
                

                <input name="arama" id="myInput" class="arama" type="text" placeholder="TARİH GİRİNİZ" size="700px" id="myInput" onkeyup="myFunction()">
         </div>
     
       
        </div>
        </div>
     <div class="randevualt">
        <div class="scroll">
     <table id="randevuPersonel">
<tr>
   <thead>
   <th>Randevu ID</th>    
   <th>Yolcu TC NO</th>
<th>Yolcu Ad</th>
<th>Yolcu Soyad</th>
<th>Yolcu Tel No</th>
<th>Şoför Ad</th>
<th>Şoför Soyad</th>
<th>Şoför Tel No</th>
<th>Araç Plaka</th>

<th>Adres</th>
<th>Tarih</th>
<th>Saat</th>
        </thead>


        <tbody>
        <?php
                                $sqll = "SELECT randevu.r_tarih ,randevu.r_id,randevu.r_saat , musteri.m_tc , musteri.m_ad , musteri.m_soyad , musteri.m_tel_no ,randevu.adres, sofor.s_ad , sofor.s_soyad , sofor.s_tel_no ,sofor.plaka 
                                FROM sofor , randevu , musteri
                                WHERE sofor.s_tc_no=randevu.s_tc_id and musteri.m_tc=randevu.m_tc";
                                $result = $baglan->query($sqll);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        echo "<tr>";
                                        echo "<td>" . $row["r_id"] . "</td>";
                                        echo "<td>" . $row["m_tc"] . "</td>";
                                        echo "<td>" . $row["m_ad"] . "</td>";
                                        echo "<td>" . $row["m_soyad"] . "</td>";
                                        echo "<td>" . $row["m_tel_no"] . "</td>";
                                        echo "<td>" . $row["s_ad"] . "</td>";
                                        echo "<td>" . $row["s_soyad"] . "</td>";
                                        echo "<td>" . $row["s_tel_no"] . "</td>";
                                        echo "<td>" . $row["plaka"] . "</td>";
                                        echo "<td>" . $row["adres"] . "</td>";
                                        echo "<td>" . $row["r_tarih"] . "</td>";
                                        echo "<td>" . $row["r_saat"] . "</td>";
                                        
                                        
                                        echo `<td class="td-team">
                                                
                                                </tr>`;
                                //        echo "İsim: : " . $row["ad"]. " Soyad: ". $row["soyad"]. " - ID: " . $row["id"]. "Cinsiyet: " . $row["cinsiyet_id"]. " <br>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                               
                            ?>
        </tbody>
</tr>

</table> </div>
         
     </div>
       </div>
   </div>
   <script>
function myFunction() {
  // Değişkenleri bildirin
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("randevuPersonel");
  tr = table.getElementsByTagName("tr");
  // Tüm tablo satırlarını dolaştırın ve arama sorgusuyla eşleşmeyenleri gizleyin
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[9];
    
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
</div>
</form>
</body>
</html>
