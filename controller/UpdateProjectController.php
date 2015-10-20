<?
include('../database/connect.php');// นำเข้าไฟล์เชื่อมต่อ ฐานข้อมูล
ConnDB(); // เรียกใช้ funcion ConnDฺB เพื่อเชื่อมต่อ
//// ADD ///////////////////////////////////////////////
if(!empty($_POST["projectname"])){ //เช็คว่า ค่าที่ หน้า projectmanager.php ส่งมามีค่า หรือ ไม่ ถ้ามีให้ ทำตามคำสั่งด้านล่าง


 //// ประการตัวแปลเพื่อรับค่าเข้ามา
  $projectid=$_POST["projectid"];
	$projectname=$_POST["projectname"];
  $projectdetail=$_POST["projectdetail"];
  $projectlat=$_POST["projectlat"];
  $projectlong=$_POST["projectlong"];



// เรียกใช้ function ที่เราสร้างไว้ชื่อ updateproject
updateproject($projectid,$projectname,$projectdetail,$projectlat,$projectlong);



}else { // ถ้าข้อมูลไม่ถูกต้อง ให้แสดงข้อความ

	echo '<script language="javascript">
alert("ข้อมูลไม่ถูกต้อง");
window.location="../admin/projectmanager.php";
</script>';

}

function updateproject($projectid,$projectname,$projectdetail,$projectlat,$projectlong) { // function Update ข้อมูลโครงการลงในฐานข้อมูล

  global $conn; // เรียกตัวแปล conn มาเพื่อรอการเชื่อมต่อฐานข้อมูล


 //ชุดคำสั่ง  update  ค่าลงในฐานข้อมูล ในตารางข้อมูลที่ชื่อว่า  project
	$sqlpro="UPDATE project SET project_name='$projectname',project_detail='$projectdetail',project_lat='$projectlat',project_long='$projectlong'
  WHERE project_ID = '$projectid';";

	mysql_query($sqlpro) or die(mysql_error()); //นำชุดคำสั่งมาใช้

  CloseDB(); // เมื่อทำเสร็จแล้วให้ปิดการเชื่อมต่อ และ ทำการกลับไปที่หน้า admin/projectmanager.php
  header( "location: ../admin/projectmanager.php" ); // =>>>> กลับไป

}







?>
