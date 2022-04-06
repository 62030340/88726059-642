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
    // $dcf_name = $_POST['dcf_name'];
    
    $sql = "UPDATE documents 
            SET doc_num  = ?, 
                doc_title = ?,
                doc_start_date = ?,    
                doc_to_date = ?, 
                doc_status = ?
                -- ,
                -- doc_file_name = ?,
                -- doc_file_Temp_name= ?
            WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssssi",  $dc_num, $dc_title, $dcs_date, $dct_date, $dc_status,$dc_id);
    // $stmt->bind_param("sssssi",  $dc_num, $dc_title, $dcs_date, $dct_date, $dc_status, $dcf_name, $doc_file_Temp_name,$dc_id);
    $stmt->execute();
     
    // $ids = $_GET['ids'];
    // $sqls = "SELECT *
    //         FROM documents
    //         WHERE id = ?";

    // $stmts = $mysqli->prepare($sqls);
    // $stmts->bind_param("i", $ids);
    // $stmts->execute();
    // $results = $stmts->get_result();
    // $rows = $results->fetch_object();

    
    
    
    // $htt ='http://localhost/document/ADD_DSTAFF.php?id='.$dc_id;
    // print_r($htt);
    // header("location: EDit_DSTAFF.php?id=".$dc_id);
    header("location: addstafftodocument.php?id=$mysqli->insert_id");
    // // header("location: management.php");
    // header("location:$htt ");


} else {
    $id = $_GET['id'];
    $sql = "SELECT *
            FROM documents
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
    <title>Edit Appoint</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1> <button  type="button" class="btn btn-info"  onClick="window.history.back() ">
            <span class='glyphicon glyphicon-arrow-left'></span>
        </button> แก้ไขคำสั่งแต่งตั้ง</h1>
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
            <!-- </div>
            <div class="form-group">
                <label for="dc_status">รายชื่อกรรมการ</label>
                <br>
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
                        < ?php echo $row->doc_status;?>
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
                        < ?php echo $row->doc_status;?>
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
                        < ?php echo $row->doc_status;?>
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
                        < ?php echo $row->doc_status;?>
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
                        < ?php echo $row->doc_status;?>
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
                        < ?php echo $row->doc_status;?>
                </label>
                <br>
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
                <label class="form-check-label" for="defaultCheck2">
                        < ?php echo $row->doc_status;?>
                </label>
                
            </div> -->
            <!-- <div class="form-group">
                <label for="dcf_name">ชื่อไฟล์เอกสาร</label>
                
                <input type="text" class="form-control" name="dcf_name" id="dcf_name"value="< ?php echo $row->doc_file_name;?>">
            </div>
            < class="form-group">
                <label for="docfile">เพิ่มไฟล์เอกสาร</label>
                <input type="file" name="fileToUpload" id="fileToUpload"><br>
                 <input type="submit" value="Upload file" name="submit"> 
            </ div> --> 

            <br>
            <input type="hidden" name="id" value="<?php echo $row->id;?>">
            <button type="submit" class="btn btn-success" >Update</button>
        </form>
</body>

</html>