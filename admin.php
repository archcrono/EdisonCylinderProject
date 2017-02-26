<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  </head>
  <body>

    <script type="text/javascript">
      $(document).ready(function(){
        $.ajax({
          type: "GET",
          url: "php/get.php",
          dataType: "json",
          success: function(response){

            console.log(response);
          }
        });
      });
    </script>
    <?php
      // $link = mysql_connect("tropht.com:3306","trophtco_Brake","StrongPassword1");
      // $db = mysql_select_db('trophtco_cylinderProject');
      // if(!$link){
      //   die('Could not connect: ' . mysql_error());
      // }
      // echo 'Connected successfully';
      //
      // if($db){
      //   echo 'Found database!';
      // }else{
      //   echo 'Could not find database';
      // }
      // mysql_close($link);
     ?>
     <br>
     <?php
        // $query = mysql_query("SELECT * FROM cylinderData");
        //
        // while($row = mysql_fetch_array($query)){
        //   $cylinderName = $row['cylinderName'];
        //
        //   echo $cylinderName . '<br>';
        // }
      ?>
  </body>
</html>
