<?php
require_once("dbconfig.php");

// ตรวจสอบว่ามีการ post มาจากฟอร์ม ถึงจะลบ
if ($_POST){
    $ddoc_id   = $_POST['ddoc_id'];
    $dstf_id  = $_POST['dstf_id  '];
   
    

    $sql = "UPDATE doc_staff 
            SET 
                stf_id  = ?,
            WHERE doc_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $ddoc_id,$dstf_id);
    // $stmt->execute();
    // $stmt == false
    // $this->db->conn->error_list
    // $stmt->execute([  $doc_id,$stf_id]);

    header("location: detail_Staff.php");
} else {
    $id = $_GET['id'];
    $sql = "SELECT *
            FROM doc_staff
            WHERE doc_id = ?";

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
    <title>EDIT DETAIL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>ลบรายละเอียด</h1>
        <button  type="button" class="btn btn-info"  onClick="window.history.back() "><span class='glyphicon glyphicon-arrow-left'></span></button>

        <form action="edit_Detail.php" method="post">
            
            <div class="form-group">
                <label for="ddoc_id ">ddoc_id </label>
                <input type="text" class="form-control" name="ddoc_id " id="ddoc_id " value="<?php echo $row->doc_id ;?>">
            </div>
            <div class="form-group">
                <label for="dstf_id ">dstf_id </label>
                <input type="text" class="form-control" name="dstf_id " id="dstf_id " value="<?php echo $row->stf_id ;?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $row->doc_id;?>">
            <button type="submit"            class="btn btn-success"><span class='glyphicon glyphicon-export'></span></button>
            
        </form>
</body>

</html>