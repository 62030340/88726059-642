<?php
require_once("dbconfig.php");

// ตรวจสอบว่ามีการ post มาจากฟอร์ม ถึงจะลบ

    

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
    <th>
    <?php
require_once("dbconfig.php");
$id = $_GET['id'];
if ($_POST){
    $did = $_POST['doc_id'];
    echo "<pre>";
    print_r($_POST);
for($i=0;$i<count($_POST['staff_id']);$i++){
    // echo $_POST['staff_id'][$i];
    $sql = "INSERT 
    INTO doc_staff (doc_id, stf_id) 
    VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ii", $did, $_POST['staff_id'][$i]);
    $stmt->execute();
}

}
?>

<form action="#" method="post">
<input type="hidden" name="doc_id" value="<?php echo $id; ?>">
<?php

$sql = "SELECT *
        FROM staff
        ORDER BY id";
        $stmt = $mysqli->prepare($sql);
        // $stmt->bind_param("s", $kw);
        $stmt->execute();
        $result = $stmt->get_result();
// <!-- select * from staff เปลี่ยน value และ aaa ตามฟิลด์ -->
// <!-- <input type="checkbox" name="staff_id[]" value="1">aaa<br> -->
while($row = $result->fetch_object()){ 
    echo "<input type='checkbox' name='staff_id[]' value='$row->id'>$row->stf_name<br>";
}
?>
<input type="submit">
</form>



    </th>
  </tr>
</table>

</section>
</body>

</html>
