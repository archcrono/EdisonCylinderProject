<?php
  $con = mysql_connect("tropht.com:3306","trophtco_Brake","StrongPassword1");
  $db = mysql_select_db('trophtco_cylinderProject');

  if(!$con){
    die('Could not connect: ' . mysql_error());
  }
  echo 'Connected successfully';

  if($db){
    echo 'Found database!';
  }else{
    echo 'Could not find database';
  }

  $query = mysql_query("SELECT * FROM cylinderData");

  while($row = mysql_fetch_array($query)){
    $cylinderName = $row['cylinderName'];

    echo $cylinderName . '<br>';
  }

  $array = [
    "foo" => "bar",
    "bar" => "foo",
  ];

  echo $array;
  mysql_close($con);
 ?>
