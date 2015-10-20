<?
include('../database/connect.php');// นำเข้าไฟล์เชื่อมต่อ ฐานข้อมูล
ConnDB(); // เรียกใช้ funcion ConnDฺB เพื่อเชื่อมต่อ
//// ADD ///////////////////////////////////////////////
if(!empty($_POST["projectname"])){ //เช็คว่า ค่าที่ หน้า projectmanager.php ส่งมามีค่า หรือ ไม่ ถ้ามีให้ ทำตามคำสั่งด้านล่าง


 //// ประการตัวแปลเพื่อรับค่าเข้ามา
	$projectname=$_POST["projectname"];
  $projectdetail=$_POST["projectdetail"];
  $projectlat=$_POST["projectlat"];
  $projectlong=$_POST["projectlong"];



// เรียกใช้ function ที่เราสร้างไว้ชื่อ insertproject
insertproject($projectname,$projectdetail,$projectlat,$projectlong);



}else { // ถ้าข้อมูลไม่ถูกต้อง ให้แสดงข้อความ

	echo '<script language="javascript">
alert("ข้อมูลไม่ถูกต้อง");
window.location="../admin/projectmanager.php";
</script>';

}

function insertproject($projectname,$projectdetail,$projectlat,$projectlong) { // function insert ข้อมูลโครงการลงในฐานข้อมูล

  global $conn; // เรียกตัวแปล conn มาเพื่อรอการเชื่อมต่อฐานข้อมูล


 //ชุดคำสั่ง  insert  ค่าลงในฐานข้อมูล ในตารางข้อมูลที่ชื่อว่า  project
	$sqlpro="INSERT INTO
			 project (project_name,project_detail,project_lat,project_long)
			 VALUES ('$projectname',
			 		 '$projectdetail',
					 '$projectlat',
					 '$projectlong')";

	mysql_query($sqlpro) or die(mysql_error()); //นำชุดคำสั่งมาใช้

  CloseDB(); // เมื่อทำเสร็จแล้วให้ปิดการเชื่อมต่อ และ ทำการกลับไปที่หน้า admin/projectmanager.php
  header( "location: ../admin/projectmanager.php" ); // =>>>> กลับไป

}







?>
