<!DOCTYPE html>
<html lang="en">

<head>
    <title> ตารางภาพยนตร์ </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    
</head>
<style>
table, th {
  border:1px solid black;
  text-align: center;
}
td{
    border:1px solid black;
    /* text-align: left; ; */
}
.tablebank{
    
    text-align: center;
}
</style>
<center> 
<body>
    <h2> ตารางภาพยนตร์ </h2>
        <h3> <a href='new_movie.php'>new_movie</a> <a href='new_movie.php'> [ + ]</a></h3> 
        
    <div class="container">
        
              
            

        <?php
        require_once("server.php");

      
        
        if ($_POST) {
            $kw = "%{$_POST['kw']}%";
        }
        else {$kw = "%";}  

        $sql = "SELECT *
                FROM movies
                WHERE concat(id  , mv_name ) LIKE ? 
                ORDER BY id";

  
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $kw);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // num_rows เป็นจำนวนแถวที่ได้กลับคืนมา
        if ($result->num_rows == 0) {
            echo "ไม่พบภาพยนตร์ที่คุณค้นหา";
        } else {
            echo "พบ " . $result->num_rows . " เรื่อง.";
            // สร้างตัวแปรเพื่อเก็บข้อความ html 
            $table = "<table class='table table-hover'>
                        <thead>
                            <tr>
                                
                                <th scope='col'>&nbsp;&nbsp;  ชื่อภาพยนตร์ &nbsp;&nbsp;  </th>
                                <th scope='col'>&nbsp;&nbsp; รายได้รวม&nbsp;&nbsp; </th>
                                <th scope='col'>&nbsp;&nbsp; ปีที่ฉาย&nbsp;&nbsp; </th>
                            </tr>
                        </thead>
                        <tbody>";
                        
            // 
            $i = 1; 
            $sumtotol = 0;
            // ดึงข้อมูลออกมาทีละแถว และกำหนดให้ตัวแปร row 
            while($row = $result->fetch_object()){ 
                $table.= "<tr>";
                $table.= "<td> &nbsp;&nbsp; $row->mv_year	&nbsp;&nbsp; </td>";
                $table.= "<td width ='50%' align='left' >&nbsp;&nbsp; $row->mv_name&nbsp;&nbsp; </td>";
                $numprice = $row->mv_revenue;
                $numpriceformat = number_format($numprice);
                $table.= "<td>&nbsp;&nbsp;  $numpriceformat &nbsp;&nbsp; </td>";
               
                $table.= "</tr>";
                $sumtotol += $row->mv_revenue;
                
                if ($i == $result->num_rows ) {
                    $table.= "<tr>";
               
                
                $table.= "<td colspan='2' align ='center'><b>รวม</b></td>";
                $Sumpriceformat = number_format($sumtotol);
                $table.= "<td>$Sumpriceformat</td>";
               
                $table.= "</tr>";
              
                }$i++;
            }

            $table.= "</tbody>";
            $table.= "</table>";
        
            echo $table;

            
        }
        ?>
    </div>
</body>
</center>
</html>