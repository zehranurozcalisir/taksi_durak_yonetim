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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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
          <div class="ortaaltust"> TABLOLAR</div>
          <div class="ortaaltalt"> 
              <div class="ustkisim"> 
                  <div class="kutu1"> </div>
              </div>
              <div class="grafikler"> 
              <div class="grafikust">
              <div class="grafik1"> 
                <div class="soforListe"><span class="sofListe"> ŞOFÖR LİSTESİ</span></div>
              <form action="soforEklee.php" method="POST">
              <div class="sofordiv"> 
            <input name="sofor_tc" class="text1" type="text" placeholder=" Şoför TC" >
         </div>
         <div class="sofordiv"> 
            <input name="sofor_ad" class="text1" type="text" placeholder=" Şoför Ad" >
         </div>
         <div class="sofordiv">  
            <input name="sofor_soyad" class="text1" type="text" placeholder=" Şoför Soyad" >
         </div>
         <div class="sofordiv"> 
            <input name="sofor_tel" class="text1" type="text" placeholder=" Şoför Telefon" >
         </div>
         <div class="sofordiv">  
            <input name="plaka_no" class="text1" type="text" placeholder=" Plaka" >
         </div>
          
            <button class="ekle" type="submit" name="ekle" > EKLE </button> </form>
            <div class="ara"><input class="ara" type="search" id="myInput" onkeyup="myFunction()" name="ara" placeholder=" Şoför TC'ye Göre Arayınız"> </div>
        </form>   <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300" rel="stylesheet">
    <div class="tablolarTablo2">      
<table id="personelA">
<thead>
<tr>
<th>Şoför Tc</th>
<th>Şoför Ad</th>
<th>Şoför Soyad</th>
<th>Şoför Telefon</th>
<th>Plaka</th>
        </thead>
<tbody>
<?php
                                $sqll = "SELECT sofor.s_tc_no , sofor.s_ad , sofor.s_soyad , sofor.s_tel_no , sofor.plaka
                                FROM sofor ";
                                $result = $baglan->query($sqll);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        echo "<tr>";
                                        echo "<td>" . $row["s_tc_no"] . "</td>";
                                        echo "<td>" . $row["s_ad"] . "</td>";
                                        echo "<td>" . $row["s_soyad"] . "</td>";
                                        echo "<td>" . $row["s_tel_no"] . "</td>";
                                        echo "<td>" . $row["plaka"] . "</td>";
                                        
                                        echo `<td class="td-team">
                                                
                                                </tr>`;
                                //        echo "İsim: : " . $row["ad"]. " Soyad: ". $row["soyad"]. " - ID: " . $row["id"]. "Cinsiyet: " . $row["cinsiyet_id"]. " <br>";
                                    }
                                } 
                               
                            ?>
</tbody>
</tr>

</table> </div>
</div>
              <div class="grafik2"> <form action="taksiEkle.php" method="POST">
              <div class="randListe"><span class="randevuListe"> ARAÇ LİSTESİ</span></div>
              <div class="sofordiv"> 
            <input name="plaka" class="text1" type="text" placeholder=" Plaka" >
         </div>
         <div class="sofordiv"> 
            <input name="yolcu_kapasite" class="text1" type="text" placeholder=" Yolcu Kapasitesi" >
         </div>
         <div class="sofordiv">  
            <input name="arac_tipi" class="text1" type="text" placeholder=" Araç Tipi" >
         </div>
         
              
            <button class="ekle" type="submit" name="ekle" > EKLE </button>  </form> 
            
            <div class="ara"><input class="ara" type="search" id="myInputt" onkeyup="myFunctionn()" name="ara" placeholder=" Plakaya Göre Arayınız"> </div>
            
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300" rel="stylesheet">
<div class="tablolarTablo1"><table id="personelB">
  <thead>
<tr>

<th>Plaka</th>
<th>Yolcu Kapasitesi</th>
<th>Araç Tipi</th>

</tr>
                              </thead>
<tbody>
<tbody>
<?php
                                $sqll = "SELECT arac.plaka , arac.y_kapasite , arac.b_tipi
                                FROM arac ";
                                $result = $baglan->query($sqll);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        echo "<tr>";
                                        echo "<td>" . $row["plaka"] . "</td>";
                                        echo "<td>" . $row["y_kapasite"] . "</td>";
                                        echo "<td>" . $row["b_tipi"] . "</td>";
                                       
                                        echo `<td class="td-team">
                                                
                                                </tr>`;
                                //        echo "İsim: : " . $row["ad"]. " Soyad: ". $row["soyad"]. " - ID: " . $row["id"]. "Cinsiyet: " . $row["cinsiyet_id"]. " <br>";
                                    }
                                } 
                               
                            ?>
</tbody>
                              </tbody>
</table> </div> </canvas></div></div>


              </div></div>
          </div>
       </div>
   </div>
</div> 
<script>
function myFunction() {
  // Değişkenleri bildirin
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("personelA");
  tr = table.getElementsByTagName("tr");
  // Tüm tablo satırlarını dolaştırın ve arama sorgusuyla eşleşmeyenleri gizleyin
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
function myFunctionn() {
  // Değişkenleri bildirin
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInputt");
  filter = input.value.toUpperCase();
  table = document.getElementById("personelB");
  tr = table.getElementsByTagName("tr");
  // Tüm tablo satırlarını dolaştırın ve arama sorgusuyla eşleşmeyenleri gizleyin
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    
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
    'Red',
    'Blue',
    'Yellow'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [300, 50, 100],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};
const config = {
  type: 'pie',
  data: data,
};
const labels = ["a","b","c"];
const data2 = {
  labels: labels,
  datasets: [{
    label: 'My First Dataset',
    data: [65, 59, 80],
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
const labels3 = ["a","b","c"];
const data3 = {
  labels: labels3,
  datasets: [{
    label: 'My First Dataset',
    data: [65, 59, 80],
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

const ctx = document.getElementById('grafik1');
            const myChart = new Chart(ctx, config);
const ctx2 = document.getElementById('grafik2');
 const myChart2 = new Chart(ctx2, config2);
 const ctx3 = document.getElementById('grafik3');
 const myChart3 = new Chart(ctx3, config3);



    </script>
</body>     
</html>