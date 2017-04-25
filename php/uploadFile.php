<?php

// Picture File
$pictureFileName = $_FILES["cylinderTop"]["name"];
$pictureFileTmpLoc = $_FILES["cylinderTop"]["tmp_name"];
$pictureFileType = $_FILES["cylinderTop"]["type"];
$pictureFileSize = $_FILES["cylinderTop"]["size"];
$pictureFileErrorMsg = $_FILES["cylinderTop"]["error"];

// Audio File
$pictureAudioName = $_FILES["cylinderAudio"]["name"];
$pictureAudioTmpLoc = $_FILES["cylinderAudio"]["tmp_name"];
$pictureAudioType = $_FILES["cylinderAudio"]["type"];
$pictureAudioSize = $_FILES["cylinderAudio"]["size"];
$pictureAudioErrorMsg = $_FILES["cylinderAudio"]["error"];

// CylinderID
$id = $_POST["id"];


// Handle Picture File
if(!$pictureFileTmpLoc){
  echo "ERROR: You have not selected a file to be uploaded.";
  exit();
}
if(move_uploaded_file($pictureFileTmpLoc, "../img/cylinderTops/$id" . "cylinderTop.jpg")){
  echo "$pictureFileName upload is complete";
}else{
  echo "move_uploaded_file function failed";
}

// Handle Audio File
if(!$pictureAudioTmpLoc){
  echo "ERROR: You have not selected a file to be uploaded.";
  exit();
}
if(move_uploaded_file($pictureAudioTmpLoc, "../audio/cylinderAudio/$id" . "cylinderAudio.mp3")){
  echo "$pictureAudioName upload is complete";
}else{
  echo "move_uploaded_file function failed";
}


 ?>
