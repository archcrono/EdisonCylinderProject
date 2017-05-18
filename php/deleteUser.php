<?php

if(isset($_REQUEST)){
  $con = mysql_connect("tropht.com:3306","trophtco_Brake","StrongPassword1") or die('Cannot connect to DB' . mysql_error());
  $db = mysql_select_db('trophtco_cylinderProject') or die('Cannot select DB');

  // Variable
  $userID = $_POST['userID'];

  $sql = "DELETE FROM admins where userID = $userID";

  $result = mysql_query($sql);
  if($result){
    echo "User deleted";
  }else{
    echo "Unable to delete user";
  }

}


 ?>
