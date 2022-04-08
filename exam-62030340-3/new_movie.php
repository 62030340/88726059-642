

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>New Movie</title>
</head>
<body>
<div class="container">
    
    <form action="save_movie.php" method="post">
      
 <h1>เพิ่มภาพยนตร์</h1>
       
        <div class="input-group">
            <label for="stf_code">ชื่อภาพยนตร์</label> 
            <input type="text" placeholder="ข้อความไม่เกิน 100 ตัวอักษร"class="form-control" name="mv_name" id="mv_name">
        </div>
        <div class="input-group">
            <label for="stf_name">รายได้รวม</label>
            <input type="text" placeholder="ตัวเลขไม่เกิน 11 ตัวอักษร"class="form-control" name="mv_revenue" id="mv_revenue">
        </div>
        <div class="input-group">
            <label for="stf_name">ปีที่ฉาย</label>
            <input type="text" placeholder="ตัวเลขเท่ากับ  4 ตัวอักษร"class="form-control" name="mv_year" id="mv_year">
        </div>
        
        <button  type="button" class="btn btn-info"  onClick="window.history.back() ">ย้อนกลับ</span></button>
        <button type="submit"            class="btn btn-success">บันทึก</button>
        
    </form>

</body>
</html>