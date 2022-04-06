<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <title>STAFF A4</title>

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
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  /* border-bottom: 1px solid #ddd; */
}
.cen{
  padding: 8px;
  text-align: center;
  /* border-bottom: 1px solid #ddd; */
}
.l1{
  border-collapse: collapse;
  width: 15%;

}
</style>
<table>
  <tr>
    <th class="cen" ><img src="Images\Garuda.png" alt="Garuda" width="80" height="80" ></th>
  </tr>
</table>





<?php 
require_once("dbconfig.php");
if ($_POST){
    // echo "<pre>";
    // print_r($_POST);
    $id = $_POST['id'];

    $sql = "DELETE 
            FROM doc_staff 
            WHERE doc_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
 
    @$staff_id = $_POST['staff_id'];

    if(!empty($staff_id)){
        for ($i=0; $i<count($staff_id); $i++){
            $sql = "INSERT 
                    INTO doc_staff (doc_id, stf_id) 
                    VALUES (?, ?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("ss", $id, $staff_id[$i]);
            $stmt->execute();
        }
    }
    
    header("location: management.php");
} else {
    $doc_id = $_GET['id'];
    $sql = "SELECT *
            FROM documents
            WHERE id = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $doc_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_object();
    // echo "<h4>$row->doc_num : $row->doc_title</h4>";
?>
    
<table>
  <tr>
    <th class ="l1">เลขที่คำสั่ง : </th>
    <td><?php  echo $row->doc_num  ?>  </td>
  </tr>
</table>

<table>
  <tr>
    <th class ="l1">ชื่อคำสั่ง : </th>
    <td><?php  echo$row->doc_title  ?>  </td>
  </tr>
</table>
<table>

<?php 
    $sql = "SELECT * 
            FROM staff LEFT JOIN (SELECT * FROM doc_staff WHERE doc_id = ?) ds ON staff.id = ds.stf_id
            ORDER BY staff.id";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $doc_id);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<table>
  <tr>
    <th class ="l1">รายชื่อกรรมการ : </th>
    <td> </td>
  </tr>
</table>
<table>
  <tr>
    <th class ="l1"> </th>
    <td> 
        <form action="Add_Staff_doc.php" method="post">
    <input type="hidden" name="id" value="<?php echo $doc_id; ?>">
    <?php
    while($row = $result->fetch_object()){ ?>
    <div class="checkbox">
        <label><input type="checkbox" name="staff_id[]" <?php if ($row->doc_id <> null) echo "checked";?>
                value="<?php echo $row->id; ?>"><?php echo $row->stf_name; ?></label>
    </div>
    <?php }header("location: management.php"); ?>
    <br><br>
    header("location: management.php");
    <button type="submit"  href='management.php' > Save </button>
</form>
</td>
  </tr>
</table>




</section>
</body>

</html>
