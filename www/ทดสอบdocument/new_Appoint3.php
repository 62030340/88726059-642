<?php
require_once("dbconfig.php");

// ตรวจสอบว่ามีการ post มาจากฟอร์ม ถึงจะเพิ่ม
if ($_POST){
    // $did = $_POST['did'];
    $dnum = $_POST['dnum'];
    $dtitle = $_POST['dtitle'];
    $dsdate = $_POST['dsdate'];
    // $dtdate = $_POST['dtdate'];
    // $dstatus = $_POST['dstatus'];

//------------------------------------------------------------------------------------
    $target_dir = "uploads/"; //ตำแหน่งที่เอาไฟล์ไปเก็บ
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // เอานามสกุลไฟล์ที่ upload
    $realnamefile = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["tmp_name"]);
    $tmp_file_name =  "uploads/" . substr($_FILES["fileToUpload"]["tmp_name"],5) . ".$fileType";
    $doc_file_Temp_name = substr($tmp_file_name,7);
    // print_r($tmp_f_n_to_upload);
    // echo "<br/>";
    // if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $tmp_file_name)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    // } else {
    // echo "Sorry, there was an error uploading your file.";
    // }
  
    // insert a record by prepare and bind
    // The argument may be one of four types:
    //  i - integer
    //  d - double
    //  s - string
    //  b - BLOB

    // ในส่วนของ INTO ให้กำหนดให้ตรงกับชื่อคอลัมน์ในตาราง actor
    // ต้องแน่ใจว่าคำสั่ง INSERT ทำงานใด้ถูกต้อง - ให้ทดสอบก่อน
    $sql = "INSERT 
            INTO documents ( doc_num, doc_title, doc_start_date, doc_to_date, doc_status, doc_file_name, doc_file_Temp_name) 
            VALUES (?, ?, ?, NULL, 'Active', ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssss", $dnum, $dtitle, $dsdate, $realnamefile, $doc_file_Temp_name);
    $stmt->execute();

    // redirect ไปยัง actor.php
    // echo $mysqli->insert_id;
    // header("location: addstafftodoc.php?id=$mysqli->insert_id");
    
    header("location: management.php"); // ต้องไม่มีการพิมพ์อะไรออกมาก่อนหน้านี้เลย (echo)
}
?>
<!-- --------------- -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>เพิ่มคำสั่งแต่งตั้ง</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <button type="button" class="btn" href="http://localhost/document/commandpage.php">Back</button> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>เพิ่มคำสั่งแต่งตั้ง</h1>
        <form action="new_Appoint.php" method="post" enctype="multipart/form-data">
            <!-- <div class="form-group">
                <label for="did">id</label>
                <input type="text" class="form-control" name="did" id="did">
            </div> -->
            <div class="form-group">
                <label for="dnum">Document Number</label>
                <input type="text" class="form-control" name="dnum" id="dnum">
            </div>
            <div class="form-group">
                <label for="dtitle">Document Title</label>
                <input type="text" class="form-control" name="dtitle" id="dtitle">
            </div>
            <div class="form-group">
                <label for="dsdate">Document Start Date</label>
                <input type="date" class="form-control" name="dsdate" id="dsdate">
            </div>
            <!-- <div class="form-group">
                <label for="dtdate">Document To Date</label>
                <input type="date" class="form-control" name="dtdate" id="dtdate">
            </div>
            <div class="form-group">
                <label for="dstatus">Document Status</label>
                <input type="text" class="form-control" name="dstatus" id="dstatus" value="Active">
            </div> -->
            <!-- <div class="form-group">
                <label for="dfname">Document File Name</label>
                <input type="text" class="form-control" name="dfname" id="dfname">
            </div> -->
            <!-- <div class="form-group">
                <label for="">เพิ่มไฟล์</label><br>
                <a href="addcommandfile.php" class="btn btn-primary">Add file</a>>
            </div> -->
            <div class="form-group">
                <label for="docfile">เพิ่มไฟล์เอกสาร</label>
                <input type="file" name="fileToUpload" id="fileToUpload"><br>
                <!-- <input type="submit" value="Upload file" name="submit"> -->
            </div>
            <button  href='management.php'class="btn btn-info"><span class='glyphicon glyphicon-arrow-left'></span></button>
            <button type="submit"            class="btn btn-success"><span class='glyphicon glyphicon-ok'></span></button>
            <button  href='new_Appoint.php'    class="btn btn-warning"><span class='glyphicon glyphicon-refresh'></span></button>
        </form>
        
</body>

</html>