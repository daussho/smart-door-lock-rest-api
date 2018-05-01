<!DOCTYPE html>
<html>
   <head>
      <title>Schedule</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   </head>
   <body>
      <?php
         include 'navbar.html';
      ?>
      <center>
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-4"></div>
               <div class="col-sm-4">
                  <br><h2>Schedule</h2><br>
               </div>
               <div class="col-sm-4"></div>
            </div>
            <div class="row">
               <div class="col-sm-4"></div>
               <div class="col-sm-4">
                  <table class="table table-bordered">
                     <thead>
                        <th>Jam</th>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                     </thead>
                     <tbody>
                        <?php
                           for($i=0; $i<11; $i++){
                              echo "<tr>";
                              if ($i<3){
                                 echo "<td>0".($i+7).".00</td>";   
                              } else {
                                 echo "<td>".($i+7).".00</td>";
                              }
                              
                              for($j=0; $j<5; $j++){
                                 echo "<td>";
                                 foreach ($hasil as $row){
                                    $jadwal = (string)$row->kode_waktu;
                                    $pos = (string)($j+1).(string)($i+1);

                                    if($jadwal == $pos){
                                       echo $row->kode_matkul;
                                    }
                                 }
                                 echo "</td>";
                              }
                              echo "</tr>";
                           }
                        ?>
                     </tbody>
                  </table>
                  
               <div class="col-sm-4"></div>
            </div>
         </div>
      </center>
   </body>
</html>
