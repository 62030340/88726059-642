<?php
require_once("dbconfig.php");

// ตรวจสอบว่ามีการ post มาจากฟอร์ม ถึงจะลบ
if ($_POST){
    $dc_id = $_POST['dc_id'];
    $dc_num = $_POST['dc_num'];
    $dc_title = $_POST['dc_title'];
    $dcs_date = $_POST['dcs_date'];
    $dct_date = $_POST['dct_date'];
    $dc_status = $_POST['dc_status'];
    $dcf_name = $_POST['dcf_name'];
    

    $sql = "UPDATE documents and 
            SET doc_num  = ?, 
                doc_title = ?,
                doc_start_date = ?,    
                doc_to_date = ?, 
                doc_status = ?,
                doc_file_name = ?
            WHERE id = ?"
            ;
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssssi",  $dc_num, $dc_title, $dcs_date, $dct_date, $dc_status, $dcf_name,$dc_id);
    $stmt->execute();

    header("location: management.php");
} else {
    $id = $_GET['id'];
    $sql = "SELECT  d.*, ds.stf_id
            FROM documents as d 
            INNER JOIN doc_staff as ds
            ON d.id = ds.doc_id
            WHERE id = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_object();
}

// $query3 = "
// SELECT  d.doc_num ,d.doc_title ,d.doc_start_date, d.doc_to_date ,d.doc_status, d.doc_file_name ,ds.stf_id
//             FROM documents as d 
//             INNER JOIN doc_staff as ds
//             ON d.id = ds.doc_id
// ORDER BY d.id asc" 
// or die("Error:" . mysqli_error());
// $result3 = mysqli_query($mysqli, $query3);

// echo $query3;
// exit;
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <title>Edit Appoint</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1> <button  type="button" class="btn btn-info"  onClick="window.history.back() "><span class='glyphicon glyphicon-arrow-left'></span></button> แก้ไขคำสังแต่งตั้ง</h1>
        <form action="edit_Appoint.php" method="post">
            <div class="form-group">
                <label for="dc_id">รหัส</label>
                <input type="text" readonly class="form-control" name="dc_id" id="dc_id" value="<?php echo $row->id;?>">
            </div>
            <div class="form-group">
                <label for="dc_num">เลขที่คำสั่ง</label>
                <input type="text" readonly class="form-control" name="dc_num" id="dc_num" value="<?php echo $row->doc_num ;?>" >
            </div>
            <div class="form-group">
                <label for="dc_title">ชื่อคำสั่ง</label>
                <input type="text" class="form-control" name="dc_title" id="dc_title" value="<?php echo $row->doc_title;?>" >
            </div>
            <div class="form-group">
                <label for="dcs_date">วันเริ่มต้นคำสั่ง</label>
                <input type="date" class="form-control" name="dcs_date" id="dcs_date"value="<?php echo $row->doc_start_date;?>" >
            </div>
            <div class="form-group">
                <label for="dct_date">วันสิ้นสุด</label>
                <input type="date" class="form-control" name="dct_date" id="dct_date"value="<?php echo $row->doc_to_date;?>" >
            </div>
            <div class="form-group">
                <label for="dc_status">สถานะ</label>
                <input type="text" class="form-control" name="dc_status" id="dc_status"value="<?php echo $row->doc_status;?>">
            </div>
            <div class="form-group">
                <label for="dc_status">รายชื่อกรรมการ</label>

                
                <br>
                <input class="form-check-input" type="checkbox" value="SF0001" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
                
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="SF0002" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
                
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="SF0003" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
                
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="SF0004" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
                
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="SF0005" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
                
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="SF0006" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
                
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="SF0007" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
               
                </label>
               
            
           
            </div>
            <div class="form-group">
                <label for="dcf_name">ชื่อไฟล์เอกสาร</label>
                
                <input type="text" class="form-control" name="dcf_name" id="dcf_name"value="<?php echo $row->doc_file_name;?>">
            </div>

             
            <!-- <input type="hidden" name="id" value="<?php echo $row->id;?>">
            <button type="submit" class="btn btn-success">Update</button> -->
        </form>
</body>

</html>