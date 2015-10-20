<?php
//session_start();
include_once('../database/connect.php'); //นำเข้าไฟล์   connect.php (การเชื่อมต่อ)
ConnDB(); // เรียกใช้การเชื่อมต่อ


if(!empty($_POST['username'])) { // เช็คค่าตัวแปลที่ส่งมาว่า ... username ไม่เท่ากับว่าง ถ้าไม่เท่ากับว่าง ให้ทำคำสั่งด้านล่าง
$username = $_POST['username']; // เก็บค่าตัวแปลจาก Post ไปเป็น username
$password = $_POST['password']; // เก็บค่าตัวแปลจาก Post ไปเป็น password

$rslogin = "SELECT * FROM user WHERE user_name = '$username' AND user_password = '$password' "; //ชุดคำสั่งเช็ค ค่าว่า มี  username นี้อยู่ในฐานข้อมูลหรือไม่
$rs = mysql_db_query($dbname,$rslogin); // ทำการค้นหาตามคำสั่ง
$rowlogin = mysql_fetch_array($rs); // นำค่าผลการค้นหาที่ได้เก็บไว้ใน => rowlogin
$num_rows = mysql_num_rows($rs); // นับค่าว่าออกมาได้เท่าไหร่เก็บไว้ใน => num_rows



   //เช็คว่าค่า user และ password ที่กรอกเข้ามามีอยู่หรือไม่ ถ้าเจอก็ login ได้
if(empty($num_rows)) { //ถ้านับออกมาแล้ว ข้อมูลเท่ากับ ว่าง คือ ไม่มีในฐานข้อมูล
//สั่งให้ แสดงคำเตือน

	echo '<script language="javascript">
alert("กรุณากรอกชื่อผุ้ใช้และรหัสผ่านให้ถูกต้อง");
window.location="../backend/login.php";
</script>';


} else { // ถ้ามีให้เข้าไปที่หน้า index.php ได้ อยู่ใน folder : admin

	$_SESSION['userName'] = $rowlogin['user_name'];


 header( "location: ../admin/index.php" ); // สั่งให้ไปที่หน้า index.php ของ admin


}
}



?>
