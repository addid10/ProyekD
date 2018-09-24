<?php
if(isset($_POST["idService"]))
{
require("db.php");
$output = '';
 $Tampil_data = $connection->prepare(
     "SELECT * FROM service_komputer WHERE idService = '".$_POST["idService"]."'");
 
        $Tampil_data->execute();
        $daftar = $Tampil_data->fetchAll(PDO::FETCH_OBJ);
        $output .= '
        <div class="table-responsive">  
        <table class="table" style="margin:0px;padding:0px;">';
 
 foreach ($daftar as $data)
{
    $output .= '
    <tr>
       <td colspan="3">
       <center>
       <p style="font-size:30px">'.$data->Nama_Service.'</p>
       <p>'.$data->Alamat_Service.'</p>
       </center></td>
    </tr>
    <tr>
       <td rowspan="2"><center><img width="250px" src="../tables_toko/upload/'.$data->Foto_Service.'"></img></center></td>
       <td><label>Waktu Buka</label></td>  
       <td>'.$data->waktuBuka.'</td> 
    </tr>
    <tr>  
       <td><label>Penanggung Jawab</label></td>  
       <td>'.$data->Username_SA.'</td>  
    </tr>       
    <tr>
    <td colspan="3"><div id="map" style="height:270px;"></div>
    </td>
    </tr>
    </table></div>
    <br>
    
    
     <script>
    function myMap() {
        var uluru = {lat:'.$data->latitud.', lng:'.$data->longitud.'};
        var map = new google.maps.Map(document.getElementById("map"), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
    }
    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgU3bUhxPXoJUDOo8gGpMa_nJHyCG3KY0&callback=myMap"></script>
    ';
}
echo $output;   
}
?>