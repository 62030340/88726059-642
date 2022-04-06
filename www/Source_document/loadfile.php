<!DOCTYPE html>
<html>
<body>

<form action="loadfile.php" method="post" enctype="multipart/form-data">
  Select image to upload:<br>
  <!-- <input type="file" name="fileToUpload[]" id="fileToUpload"> <br> -->
  <input type="file" name="fileToUpload" id="fileToUpload"><br>
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

<?php
if ($_POST){
    echo "<pre>";
    print_r($_FILES);
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["tmp_name"]);
    $tmp_flie_name = substr( $_FILES["fileToUpload"]["tmp_name"],5 )."$FileType" ;
    $tmp_flie_to_upload = "uploads/". substr( $_FILES["fileToUpload"]["tmp_name"],5 )."$FileType" ;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$tmp_flie_name)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
          
}
?>
<a href="<?php echo $tmp_flie_name ; ?>"> Open Flie </a>

<?php
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//       echo "File is an image - " . $check["mime"] . ".";
//       $uploadOk = 1;
//     } else {
//       echo "File is not an image.";
//       $uploadOk = 0;
//     }
//   }
  
//   // Check if file already exists
//   if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
//   }
  
//   // Check file size
//   if ($_FILES["fileToUpload"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
//   }
  
//   // Allow certain file formats
//   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//   && $imageFileType != "gif" ) {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     $uploadOk = 0;
//   }
  
//   // Check if $uploadOk is set to 0 by an error
//   if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
//   // if everything is ok, try to upload file
//   } else {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//       echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//     } else {
//       echo "Sorry, there was an error uploading your file.";
//     }
//   }
  ?>