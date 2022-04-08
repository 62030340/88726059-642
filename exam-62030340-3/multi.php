<?php 

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="style.css" type="text/css" rel="stylesheet" /> -->
    <title>แม่สูตรคูณ</title>
</head>
<style>
table, th, td {
  border:1px solid black;
  text-align: center;
}
</style>
<body>
    <?php 
    $table = "<table class='table table-hover'>
    <thead>
        <tr>
            
            <th colspan='5'> &nbsp;&nbsp; ผลลัพธ์สูตรคูณแม่ $num1 x $num2  &nbsp;&nbsp;</th>
          
        </tr>
        <tr>
            
        <th scope='col'&nbsp;>แม่&nbsp;</th>
        <th scope='col'>&nbsp;คูณ&nbsp;</th>
        <th scope='col'>&nbsp;รอบ&nbsp;</th>
        <th scope='col'>&nbsp;เท่ากับ&nbsp;</th>
        <th scope='col'>&nbsp;ผลลัพธ์&nbsp;</th>
          
        </tr>
    </thead>
    <tbody>";
    
// 
$i = 1; 

while( $i<= $num2) {
    $num3 = $num1 * $i;

    
    $table .= "<tr>";

    $table .= "<td al > &nbsp;$num1 &nbsp;</td>";
    $table .= "<td>&nbsp;x &nbsp;</td>";
    $table .= "<td>$i</td>";
    $table .= "<td>&nbsp;=&nbsp;</td>";
    $table .= "<td>$num3</td>";
    $table .= "</tr>";
    $i++;
}


$table.= "</tbody>";
$table.= "</table>";

echo $table;

    
    
    ?>
    <br>
    <a href="multi.html">กลับหน้าโปรแกรมคำนวนแม่สูตรคูณ</a>
</body>
</html>
