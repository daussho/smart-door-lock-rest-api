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
         </br></br></br></br></br>
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-4"></div>
               <div class="col-sm-4">
                  <?php
                     echo "<h1><b> Hello, ".$_SESSION['id']."</h1>";
                  ?>
                  <h2>Selamat datang di ClickLock ITB</h2>
                  
               </div>
               <div class="col-sm-4"></div>
            </div>
         </div>
      </center>
   </body>
</html>