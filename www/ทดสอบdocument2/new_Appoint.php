<?php
require_once("dbconfig.php");

// ตรวจสอบว่ามีการ post มาจากฟอร์ม ถึงจะเพิ่ม
if ($_POST){
    $dc_id = $_POST['dc_id'];
    $dc_num = $_POST['dc_num'];
    $dc_title = $_POST['dc_title'];
    $dcs_date = $_POST['dcs_date'];
    $dct_date = $_POST['dct_date'];
    $dc_status = $_POST['dc_status'];
    $dcf_name = $_POST['dcf_name'];


    // insert a record by prepare and bind
    // The argument may be one of four types:
    //  i - integer
    //  d - double
    //  s - string
    //  b - BLOB

    // ในส่วนของ INTO ให้กำหนดให้ตรงกับชื่อคอลัมน์ในตาราง documents
    // ต้องแน่ใจว่าคำสั่ง INSERT ทำงานใด้ถูกต้อง - ให้ทดสอบก่อน
    $sql = "INSERT 
            INTO documents (id, doc_num, doc_title, doc_start_date, doc_to_date, doc_status, doc_file_name) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("issssss", $dc_id, $dc_num, $dc_title, $dcs_date, $dct_date, $dc_status, $dcf_name);
    $stmt->execute();

    // redirect ไปยัง PageHome.php
    header("location: management.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>เพิ่มข้อมูลคำสั่งแต่งตั้ง</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>เพิ่มข้อมูลคำสั่งแต่งตั้ง</h1>
        <form action="new_Appoint.php" method="post">
            <div class="form-group">
                <label for="dc_id">ไอดี</label>
                <input type="text"  placeholder="ตัวเลข"class="form-control" name="dc_id" id="dc_id">
            </div>
            <div class="form-group">
                <label for="dc_num">เลขที่คำสั่ง</label>
                <input type="text" placeholder="DC000XYZ" class="form-control" name="dc_num" id="dc_num">
            </div>
            <div class="form-group">
                <label for="dc_title">ชื่อคำสั่ง</label>
                <input type="text" placeholder="ข้อความไม่เกิน 1000 ตัวอักษร"class="form-control" name="dc_title" id="dc_title">
            </div>
            <div class="form-group">
                <label for="dcs_date">วันเริ่มต้นคำสั่ง</label>
                <input type="date" class="form-control" name="dcs_date" id="dcs_date">
            </div>
            <div class="form-group">
                <label for="dct_date">วันสิ้นสุด</label>
                <input type="date" class="form-control" name="dct_date" id="dct_date">
            </div>
            <div class="form-group">
                <label for="dc_status">สถานะ</label>
                <input type="text" placeholder="Active | Expire"class="form-control" name="dc_status" id="dc_status">
            </div>
            <div class="form-group">
                <label for="dcf_name">ชื่อไฟล์เอกสาร</label>
                <input type="text" placeholder="ข้อความไม่เกิน 50 ตัวอักษร"class="form-control" name="dcf_name" id="dcf_name">
            </div>
            <button  href='management.php'class="btn btn-info"><span class='glyphicon glyphicon-arrow-left'></span></button>
            <button type="submit"            class="btn btn-success"><span class='glyphicon glyphicon-ok'></span></button>
            <button  href='new_Appoint.php'    class="btn btn-warning"><span class='glyphicon glyphicon-refresh'></span></button>
        </form>
</body>

</html>