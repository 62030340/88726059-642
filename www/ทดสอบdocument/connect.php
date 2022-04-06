<?php
$db_host = "database";
$db_user = "root";
$db_password = "tiger";
// $db_name = "docdb"; //ไม่ได้ตั้งรหัสผ่านก็ลบ  yourpassword ออก

try {
  $conn = new PDO(
      "mysql:host=$db_host;
      dbname =docdb;charset=utf8", 
      $db_user, $db_password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
?>