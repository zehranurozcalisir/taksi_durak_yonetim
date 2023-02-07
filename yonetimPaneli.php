<?php
include ("baglanti.php");
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html> 
<head> 
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<title>HeyTaksi</title>
<link href="style.css" type="text/css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body > 
    <form action="giris.php" method="POST">
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
          <div class="ortaaltust"> YÖNETİM PANELİ</div>
          <div class="ortaaltalt"> 
              <div class="ustkisim"> 
                  <div class="kutu1"> </div>
              </div>
              <div class="grafikler"> 
              <div class="grafikust">
              <div class="grafikk1"> <canvas id="grafikk1"></canvas></div>
              <div class="grafikk2"> <canvas id="grafikk2"></canvas></div></div>
              <div class="grafikalt">
              <div class="grafikk3">
              <form action="" method="POST" class="form1">
            <select name="aylar" class="bayilikler" >
              <option value="OCAK">OCAK</option>
              <option value="ŞUBAT">ŞUBAT</option>
              <option value="MART">MART</option>
              <option value="NİSAN">NİSAN</option>
              <option value="MAYIS">MAYIS</option>
              <option value="HAZİRAN">HAZİRAN</option>
              <option value="TEMMUZ">TEMMUZ</option>
              <option value="AĞUSTOS">AĞUSTOS</option>
              <option value="EYLÜL">EYLÜL</option>
              <option value="EKİM">EKİM</option>
              <option value="KASIM">KASIM</option>
              <option value="ARALIK">ARALIK</option>
              
            </select>
            <button type="submit" class="bayiButton">Göster</button>
          </form>
              <canvas id="grafikk3"></canvas></div>
              <div class="grafikk4"> 
            <span class="yapilacakListe"> YAPILACAKLAR LİSTESİ</span>
            <input class="avantInput" type="text" id="myInput" onkeyup="myFunction()" placeholder="Son Tarihe Göre Arayınız" >
            <form action="yapilcakEkle.php" method="POST">
           
            <input class="ekle1" type="text" placeholder="Yapılacak İş " name="yapilacak_ad">
            <input class="ekle1" type="text" placeholder="Son Tarih" name="son_tarih">
            <button class="eklee" type="submit" name="ekle" > EKLE </button>
        </form>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300" rel="stylesheet">
<div class="personelm"> <div class="scroll7"><table id="personelm">
<tr>
  <thead>
<th>Yapılacak</th>
<th>SonTarih</th>
        </thead>
        <tbody>
        <?php
                                $sqll = "SELECT yapilacaklar.son_tarih , yapilacaklar.yapilacak_ad
                                FROM yapilacaklar";
                                $result = $baglan->query($sqll);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        echo "<tr>";
                                        echo "<td>" . $row["yapilacak_ad"] . "</td>";
                                        echo "<td>" . $row["son_tarih"] . "</td>";
                                        
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


              </div></div></div>
          </div>
       </div>
   </div>
</div> 
<?php 
        $gunler=[];
        $sqll="SELECT gunler.gun, COUNT(randevu.r_id) as randevuSayisi
        FROM gunler , randevu
        WHERE gunler.gun_id=randevu.gun_id
        GROUP BY gunler.gun_id";
        $resultt = $baglan->query($sqll);
        
        if ($resultt->num_rows > 0) {
            
            while($roww = $resultt->fetch_assoc()) {
                $gunler[$roww["gun"]] += $roww["randevuSayisi"];
            }
        } else {
            echo "0 results";
        }
        $saatler=[];
        $sqlll="SELECT randevu.r_saat , COUNT(randevu.r_id) as sayi
        FROM randevu
        GROUP BY randevu.r_saat
        ORDER BY sayi desc
        LIMIT 5";
        $resulttt = $baglan->query($sqlll);
        
        if ($resulttt->num_rows > 0) {
            
            while($rowww = $resulttt->fetch_assoc()) {
                $saatler[$rowww["r_saat"]] += $rowww["sayi"];
            }
        } else {
            echo "0 results";
        }
      
        $yillar=[];
        $sqllll="SELECT gelirler.gelir ,gelirler.gelir_yil
        FROM gelirler ,ay
        WHERE gelirler.gelir_ay_id=ay.ay_id AND ay.ay='{$_POST['aylar']} '";
        $resultttt = $baglan->query($sqllll);
        
        if ($resultttt->num_rows > 0) {
            
            while($rowwww = $resultttt->fetch_assoc()) {
                $yillar[$rowwww["gelir_yil"]] += $rowwww["gelir"];
            }
        } else {
            echo "0 results";
        }
      
        $baglan->close();
        ?>
        <script>
function myFunction() {
  // Değişkenleri bildirin
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("personelm");
  tr = table.getElementsByTagName("tr");
  // Tüm tablo satırlarını dolaştırın ve arama sorgusuyla eşleşmeyenleri gizleyin
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    
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
<script>
const data = {
  labels: [
    <?php 
                        foreach ($gunler as $key => $value) {
                          echo "'". $key ."',";
                        }
                      ?>
  ],
  datasets: [{
    label: 'Günlere Göre Randevu Sayıları',
    data: [<?php
                      foreach ($gunler as $key => $value) {
                        echo $value .",";
                      }
                      ?>],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};
const config = {
  type: 'bar',
  data: data,
};
const labels = [<?php 
                        foreach ($saatler as $key => $value) {
                          echo "'". $key ."',";
                        }
                      ?>];
const data2 = {
  labels: labels,
  datasets: [{
    label: 'En Yoğun 5 Saat Ve Randevu Sayıları',
    data: [<?php
                      foreach ($saatler as $key => $value) {
                        echo $value .",";
                      }
                      ?>],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};
const config2 = {
  type: 'bar',
  data: data2,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};
const labels3 = [  <?php 
                        foreach ($yillar as $key => $value) {
                          echo "'". $key ."',";
                        }
                      ?>];
const data3 = {
  labels: labels3,
  datasets: [{
    label: 'Aylara Göre Yıllık Gelirler',
    data: [<?php
                      foreach ($yillar as $key => $value) {
                        echo $value .",";
                      }
                      ?>],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};
const config3 = {
  type: 'line',
  data: data3,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};

const ctx = document.getElementById('grafikk1');
            const myChart = new Chart(ctx, config);
const ctx2 = document.getElementById('grafikk2');
 const myChart2 = new Chart(ctx2, config2);
 const ctx3 = document.getElementById('grafikk3');
 const myChart3 = new Chart(ctx3, config3);
    </script>
</body>     
</html>