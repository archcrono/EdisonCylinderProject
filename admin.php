<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="panel panel-default">
      <div class="jumbotron">
        <h1>UVU Cylinder Admin</h1>
      </div>
    </div>

      <!-- Search Bar -->
    <div class="row">
      <div class="col-lg-6">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div><!-- /input-group -->
      </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->



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

      console.log("Hello");
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
