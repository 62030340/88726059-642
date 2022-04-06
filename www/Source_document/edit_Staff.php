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

// ตรวจสอบว่ามีการ post มาจากฟอร์ม ถึงจะลบ
if ($_POST){
    $id = $_POST['id'];
    $stf_code  = $_POST['stf_code'];
    $stf_name = $_POST['stf_name'];
    $username = $_POST['username'];
    $password_1 = $_POST['password_1'];
    $password_p = md5($password_1);
    // echo $stf_name;
    // echo $stf_code;
    // echo $dc_id;
    // echo $id;
    // die;

    $sql = "UPDATE staff 
            SET stf_code = ?,
                stf_name = ?,
                username = ?,
                password = ?
            WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssi",  $stf_code,$stf_name,$username,$password_p,$id);
    $stmt->execute();
    // $stmt == false
    // $this->db->conn->error_list
    // $stmt->execute([ $dc_id, $stf_code,$stf_name]);

    header("location: staff_Appoint.php");
} else {
    $id = $_GET['id'];
    $sql = "SELECT *
            FROM staff
            WHERE id = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_object();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>EDIT STAFF</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        
        

        <form action="edit_Staff.php" method="post">
            <h1 >แก้ไข้ข้อมูลบุคลากร<BR>
            
            </h1>
            <div class="input-group">
                <label for="dc_id">ไอดี</label>
                <input type="text" readonly class="form-control" name="dc_id" id="dc_id" value="<?php echo $row->id;?>">
            </div>
            <div class="input-group">
                <label for="stf_code">stf_code</label>
                <input type="text"  readonly  class="form-control" name="stf_code" id="stf_code" value="<?php echo $row->stf_code;?>">
            </div>
            <div class="input-group">
                <label for="stf_name">stf_name</label>
                <input type="text" class="form-control" name="stf_name" id="stf_name" value="<?php echo $row->stf_name;?>">
            </div>
            <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username"value="<?php echo $row->stf_code;?>" required>
            </div>
            <div class="input-group">
                <label for="password_1">Password</label>
                <input type="password" name="password_1" required value="<?php echo $row->password;?>">
            </div>
            <div class="input-group">
                <label for="password_2">Confirm Password</label>
                <input type="password" name="password_2" required value="<?php echo $row->password;?>" >
            </div>
            
             <button  type="button" class="btn btn-info"  onClick="window.history.back() ">ย้อนกลับ</span></button>   
            <input type="hidden" name="id" value="<?php echo $row->id;?>">
            <!-- <button type="submit"            class="btn btn-success"><span class='glyphicon glyphicon-export'></span></button> -->
            <button type="submit"            class="btn btn-success">แก้ไข้ข้อมูล</span></button>
            <!-- <button  href='edit_Staff.php?id=$id'    class="btn btn-warning"><span class='glyphicon glyphicon-refresh'></span></button> -->
        </div>
            
</body>

</html>


    

