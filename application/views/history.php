<!DOCTYPE html>
<html>
   <head>
      <title>Home</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   </head>
   <body>
      <?php
         include 'navbar.html';
      ?>
      <center>
         </br></br></br>
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-4"></div>
               <div class="col-sm-4">
                  <br><h2>History</h2><br>
               </div>
               <div class="col-sm-4"></div>
            </div>
            <div class="row">
               <div class="col-sm-4"></div>
               <div class="col-sm-4">
                  <table class="table table-bordered">
                     <thead>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Ruangan</th>
                        <th>Mata Kuliah</th>
                     </thead>
                     <tbody>
                        <?php
                           foreach ($hasil as $row){
                              echo "<tr>";
                              echo "<td>".$row->tanggal."</td>";
                              echo "<td>".$row->waktu."</td>";
                              echo "<td>".$row->kode_ruangan."</td>";
                              echo "<td>".$row->kode_matkul."</td>";
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
