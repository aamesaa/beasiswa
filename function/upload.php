<?php
$target_dir = "uploads/"; //specifies the directory where the file is going to be placed
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //specifies the path of the file to be uploaded
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);//holds the file extension of the file
// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

if($imageFileType != "pdf") {
echo "Sorry, only PDF files are allowed.";
$uploadOk = 0;
}*/
//check file extension
if($check !== false) {
  echo "File is an image - " . $check["mime"] . ".";
  $uploadOk = 1;
} else {
  echo "File is not a pdf format.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
