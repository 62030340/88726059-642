<?php
require_once("server.php");


if ($_POST){
    // $id = $_POST['id'];
    $mv_name  = $_POST['mv_name'];
    $mv_revenue = $_POST['mv_revenue'];
    $mv_year  = $_POST['mv_year'];
    // insert a record by prepare and bind
    // The argument may be one of four types:
    //  i - integer
    //  d - double
    //  s - string
    //  b - BLOB

    // ในส่วนของ INTO ให้กำหนดให้ตรงกับชื่อคอลัมน์ในตาราง documents
    // ต้องแน่ใจว่าคำสั่ง INSERT ทำงานใด้ถูกต้อง - ให้ทดสอบก่อน
    $sql = "INSERT 
            INTO movies ( mv_name, mv_revenue,mv_year ) 
            VALUES ( ?, ?,?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sii",  $mv_name, $mv_revenue,$mv_year);
    $stmt->execute();

    // redirect ไปยัง staff_Appoint.php
    header("location: movie_list.php");
}else{
    echo "ไม่สามารถบันทึกข้อมูลได้";
    header("location: new_list.php");
}
?>