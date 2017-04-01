<?php


 $ftp_server = "www.tropht.com";
 $ftp_conn = ftp_connect($ftp_server) or die ("Could not connect to $ftp_server");
 $login = ftp_login($ftp_conn, "trophtco", "Kateishot1!1");

 $file = $_POST['audioFile'];

 if(ftp_put($ftp_conn, "testFile.mp3", $file, FTP_ASCII)){
   echo "success";
 }
 else{
   echo "error";
 }

 ftp_close($ftp_conn);
 ?>
