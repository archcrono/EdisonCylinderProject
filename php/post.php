<?php


if(isset($_REQUEST)){
  $con = mysql_connect("tropht.com:3306","trophtco_Brake","StrongPassword1") or die('Cannot connect to DB' . mysql_error());
  $db = mysql_select_db('trophtco_cylinderProject') or die('Cannot select DB');

  $name = $_POST['name'];
  $info = $_POST['age'];
  $sql = "INSERT INTO testTable (name,info) VALUES ('$name','$info')";

  $result = mysql_query($sql);
  if($result){
    echo "I hope this saved the data";
  }

}

 ?>
