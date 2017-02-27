<?php

  $con = mysql_connect("tropht.com:3306","trophtco_Brake","StrongPassword1") or die('Cannot connect to DB' . mysql_error());
  $db = mysql_select_db('trophtco_cylinderProject') or die('Cannot select DB');

  $query = "SELECT * FROM cylinders";

  $sth = mysql_query($query);
  $rows = array();
  while($r = mysql_fetch_assoc($sth)){
    $rows[] = $r;
  }
  header('Content-type: application/json');
  print json_encode($rows);

 ?>
