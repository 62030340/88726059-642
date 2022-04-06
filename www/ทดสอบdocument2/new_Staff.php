<?php
require_once("dbconfig.php");

// ตรวจสอบว่ามีการ post มาจากฟอร์ม ถึงจะเพิ่ม
if ($_POST){
    $sid = $_POST['sid'];
    $stfc  = $_POST['stfc'];
    $stfn = $_POST['stfn'];
    

    // insert a record by prepare and bind
    // The argument may be one of four types:
    //  i - integer
    //  d - double
    //  s - string
    //  b - BLOB

    // ในส่วนของ INTO ให้กำหนดให้ตรงกับชื่อคอลัมน์ในตาราง documents
    // ต้องแน่ใจว่าคำสั่ง INSERT ทำงานใด้ถูกต้อง - ให้ทดสอบก่อน
    $sql = "INSERT 
            INTO staff (sfid, stf_code, stf_name) 
            VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("iss", $sid, $stfc, $stfn);
    $stmt->execute();

    // redirect ไปยัง staff_Appoint.php
    header("location: staff_Appoint.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>New STAFF</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>เพิ่มข้อมูลบุคลากร</h1>
        <form action="new_Staff.php" method="post">
            <div class="form-group">
                <label for="id">ไอดี</label>
                <input type="text"  placeholder="ตัวเลข" class="form-control" name="sid" id="sid">
            </div>
            <div class="form-group">
                <label for="stf_code">รหัสบุคลากร</label>
                <input type="text" placeholder="SF000XYZ"class="form-control" name="stfc" id="stfc">
            </div>
            <div class="form-group">
                <label for="stf_name">ชื่อ-นามสกุล</label>
                <input type="text" placeholder="ข้อความไม่เกิน 50 ตัวอักษร"class="form-control" name="stfn" id="stfn">
            </div>
            <button  href='staff_Appoint.php'class="btn btn-info"><span class='glyphicon glyphicon-arrow-left'></span></button>
            <button type="submit"            class="btn btn-success"><span class='glyphicon glyphicon-ok'></span></button>
            <button  href='new_Staff.php'    class="btn btn-warning"><span class='glyphicon glyphicon-refresh'></span></button>
        </form>
</body>

</html>