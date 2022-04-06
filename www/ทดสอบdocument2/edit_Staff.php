<?php
require_once("dbconfig.php");

// ตรวจสอบว่ามีการ post มาจากฟอร์ม ถึงจะลบ
if ($_POST){
    // print_r($_POST);
    $sid = $_POST['sid'];
    $stfc  = $_POST['stfc'];
    $stfn = $_POST['stfn'];

    
    // echo $sid;
    // echo $stfc;
    // echo $stfn;
    // die;
    $sql = "UPDATE staff 
            SET stf_code = ?,
                stf_name = ?
            WHERE sfid  = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssi",  $stfc,$stfn,$sid);
    $stmt->execute();
    // $stmt == false
    // $this->db->conn->error_list
    // $stmt->execute([ $dc_id, $stf_code,$stf_name]);

    
    header("location: staff_Appoint.php");
} else {
    $id = $_GET['id'];
    $sql = "SELECT *
            FROM staff
            WHERE sfid  = ?";

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1><button  type="button" class="btn btn-info"  onClick="window.history.back() "><span class='glyphicon glyphicon-arrow-left'></span></button>
                    แก้ไข้ข้อมูลบุคลากร</h1>
        

        <form action="edit_Staff.php" method="post">
            <div class="form-group">
                <label for="sid">ไอดี</label>
                <input type="text" readonly class="form-control" name="sid" id="sid" value="<?php echo $row->sfid ;?>">
            </div>
            <div class="form-group">
                <label for="stfc">stf_code</label>
                <input type="text" readonly  class="form-control" name="stfc" id="stfc" value="<?php echo $row->stf_code;?>">
            </div>
            <div class="form-group">
                <label for="stfn">ชื่อเจ้าหน้าที่</label>
                <input type="text" class="form-control" name="stfn" id="stfn" value="<?php echo $row->stf_name;?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $row->sfid ;?>">
            <button type="submit"            class="btn btn-success"><span class='glyphicon glyphicon-export'></span></button>
            
        </form>
</body>

</html>