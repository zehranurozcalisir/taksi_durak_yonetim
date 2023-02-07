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
               <div class= "menuyazi"><a href="yonetimPaneli.php">Yönetim Paneli</a></div>
               <div class= "menuyazi"><a href="tablolar.php">Tablolar</a></div>
               <div class= "menuyazi"><a href="randevu.php">Randevu</a></div>
               <div class= "menuyazi"><a href="giris.php">Çıkış Yap</a></div>
              </div>
        </div> </form>
       <div class="ortaalt">
         <div class="ortaaltust"> RANDEVU</div>
           <div class="randevuust">
               <div class="randevuustsol">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100140.85516177591!2d27.181798507834532!3d38.33968307111654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b96156867558c7%3A0xd2c0cf1972fe1f25!2zQnVjYS_EsHptaXI!5e0!3m2!1str!2str!4v1638866710417!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
           </div>
        <div class="randevuustsag">
         <div class="textboxsol">
            <form action="randevuEkle.php" method="post">
         <div class="randevudiv1"> 
            <input name="yolcu_tc" class="text" type="text" placeholder="Yolcu Tc" size="700px">
         </div>
         <div class="randevudiv1"> 
         <select name="gun"  >
              <option value="25478545125">Ali Sait Turan</option>
              <option value="26957385026">Okan Satıcı</option>
              <option value="102598997623">Kerim Yurt</option>
              <option value="126587349007">Oğuz Ongun</option>
              <option value="193482670560">Berk Yaşuk</option>
              <option value="201050078334">Zeynel Bucak</option>
              <option value="203105785408">Ozan Kandemir</option>
              
            </select>
         </div>
         
         <div class="randevudiv1"> 
            <input  name="tarih" class="text" type="date" placeholder="Tarih" size="700px">
         </div>
      </div>
      <div class="textboxsag">
         <div class="randevudiv1"> 
            <input name="adres" class="text" type="text" placeholder="Adres" size="700px">
         </div>
         <div class="randevudiv1"> 
            <input name="saat" class="text" type="time" placeholder="Saat" size="700px">
         </div>
         <div class="randevudiv1"> 
         <select name="gun"  >
              <option value="1">Pazartesi</option>
              <option value="2">Salı</option>
              <option value="3">Çarşamba</option>
              <option value="4">Perşembe</option>
              <option value="5">Cuma</option>
              <option value="6">Cumartesi</option>
              <option value="7">Pazar</option>
              
            </select>
         </div>
         <div class="randevudiv1"> 
            
                <button class="buttonekle" type="submit" size="300px"> EKLE</button> </form>   <form action="randevuSil.php" method="post">
                <input name="randevuId" class="text7" type="text" placeholder="Silmek İstenilen Randevu ID" size="700px" id="myInput" onkeyup="myFunction()">
                <button class="buttonekle" type="submit" size="300px"> SİL</button> </form>
                

                <input name="search2" id="myInput" class="search3" type="text" placeholder="TARİH GİRİNİZ" size="700px" id="myInput" onkeyup="myFunction()">
         </div>
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
