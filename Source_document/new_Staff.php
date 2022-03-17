<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>
<?php
require_once("dbconfig.php");

// ตรวจสอบว่ามีการ post มาจากฟอร์ม ถึงจะเพิ่ม
if ($_POST){
    // $id = $_POST['id'];
    $stf_code  = $_POST['stf_code'];
    $stf_name = $_POST['stf_name'];
    $username  = $_POST['username'];
    $password_1 = $_POST['password_1'];
    $password = md5($password_1);
    // insert a record by prepare and bind
    // The argument may be one of four types:
    //  i - integer
    //  d - double
    //  s - string
    //  b - BLOB

    // ในส่วนของ INTO ให้กำหนดให้ตรงกับชื่อคอลัมน์ในตาราง documents
    // ต้องแน่ใจว่าคำสั่ง INSERT ทำงานใด้ถูกต้อง - ให้ทดสอบก่อน
    $sql = "INSERT 
            INTO staff ( stf_code, stf_name,username ,password) 
            VALUES ( ?, ?,?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssss",  $stf_code, $stf_name,$username,$password);
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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
        <form action="new_Staff.php" method="post">
           <!-- <button  href='staff_Appoint.php'class="btn btn-info">ย้อนกลับ</button> -->
     <h1>เพิ่มข้อมูลบุคลากร</h1>
            <!-- <div class="form-group">
                <label for="id">ไอดี</label>
                <input type="text"  placeholder="ตัวเลข" class="form-control" name="id" id="id">
            </div> -->
            <div class="input-group">
                <label for="stf_code">รหัสบุคลากร</label>
                <input type="text" placeholder="SF000XYZ"class="form-control" name="stf_code" id="stf_code">
            </div>
            <div class="input-group">
                <label for="stf_name">ชื่อ-นามสกุล</label>
                <input type="text" placeholder="ข้อความไม่เกิน 50 ตัวอักษร"class="form-control" name="stf_name" id="stf_name">
            </div>
            <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" required>
            </div>
            <div class="input-group">
                <label for="password_1">Password</label>
                <input type="password" name="password_1" required>
            </div>
            <div class="input-group">
                <label for="password_2">Confirm Password</label>
                <input type="password" name="password_2" required>
            </div>
            
            <button  type="button" class="btn btn-info"  onClick="window.history.back() ">ย้อนกลับ</span></button>
            <button type="submit"            class="btn btn-success">บันทึก</button>
            <!-- <button  href='new_Staff.php'    class="btn btn-warning"><span class='glyphicon glyphicon-refresh'></span></button> -->
        </form>
</body>

</html>