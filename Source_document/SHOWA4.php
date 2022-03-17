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

    $id = $_GET['id'];
    $sql = "SELECT  d.*, ds.*
   
    --  , s.*
            FROM documents as d 
            JOIN doc_staff as ds 
            ON d.id = ds.doc_id 
            -- JOIN staff as s
            -- ON  ds.stf_id = s.id
            WHERE id  = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_object();

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <title>SHOW A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: A4 }</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="A4">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <!-- Write HTML just like a web page -->
<style>
table {
  width: 100%;
  border: 1px solid;
}

</style>
<table>
  <tr>
    <th><img src="Images\Garuda.png" alt="Garuda" width="80" height="80" ></th>
  </tr>
</table>
<table>
  <tr>
    <th>คำสั่ง</th>
  </tr>
</table>

<table>
  <tr>
    <th><?php  echo $row->doc_title;?></th>
  </tr>
</table>

<table>
  <th >
    <?php  echo $row->stf_id;?></th>
    
  </th>
  </tr>
</table>

<?php
        require_once("dbconfig.php");

        // ตัวแปร $_POST เป็นตัวแปรอะเรย์ของ php ที่มีค่าของข้อมูลที่โพสมาจากฟอร์ม
        // ดึงค่าที่โพสจากฟอร์มตาม name ที่กำหนดในฟอร์มมากำหนดให้ตัวแปร $kw
        // ใส่ % เพือเตรียมใช้กับ LIKE
        
        if ($_POST) {
            $kw = "%{$_POST['kw']}%";
        }
        else {$kw = "%";}  

        // เตรียมคำสั่ง SELECT ที่ถูกต้อง(ทดสอบให้แน่ใจ)
        // ถ้าต้องการแทนที่ค่าของตัวแปร ให้แทนที่ตัวแปรด้วยเครื่องหมาย ? 
        // concat() เป็นฟังก์ชั่นสำหรับต่อข้อความ
        // $sql = "SELECT *
        //         FROM doc_staff
        //         WHERE concat(doc_title , doc_num ) LIKE ? 
        //         ORDER BY id";

        // // Prepare query
        // // Bind all variables to the prepared statement
        // // Execute the statement
        // // Get the mysqli result variable from the statement
        // $stmt = $mysqli->prepare($sql);
        // $stmt->bind_param("i", $kw);
        // $stmt->execute();
        // // Retrieves a result set from a prepared statement
        // $result = $stmt->get_result();
        
        // num_rows เป็นจำนวนแถวที่ได้กลับคืนมา
        if ($result->num_rows == 0) {
            echo "Not found!";
        } else {
            echo "Found " . $result->num_rows . " record(s).";
            // สร้างตัวแปรเพื่อเก็บข้อความ html 
            $table = "<table class='table table-hover'>
                        <thead>
                            <tr>
                                <th scope='col'>#</th>
                                
                            </tr>
                        </thead>
                        <tbody>";
                        
            // 
            $i = 1; 

            // ดึงข้อมูลออกมาทีละแถว และกำหนดให้ตัวแปร row 
            while($row = $result->fetch_object()){ 
                $table.= "<tr>";
       
                $table.= "<td>$row->stf_id</td>";

                $table.= "</tr>";
            }

            $table.= "</tbody>";
            $table.= "</table>";
            
            echo $table;
        }
        ?>

</section>
</body>

</html>
