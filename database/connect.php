<?php

 	$host = "localhost"; //ชื่อ host
	$user = "root"; // user name ของ phpmyadmin
	$passwd = "1234"; // password ของ phpmyadmin
	$dbname = "royalproject"; // ชื่อ ฐานข้อมูล

/*ฟังก์ชั่นเปิด Connection ติดต่อกับ MYSQL Server */

  function ConnDB() // function ชื่อว่า ConnDB
  {

   		global $conn;
			global $host;
			global $user;
			global $passwd;
      		global $dbname;

  		$conn = mysql_connect($host,$user,$passwd); //ทำการเชื่อมต่อ phpmyadmin my sql

     		if ($conn){ // ถ้าสามารถเชื่อมต่อได้ให้ทำคำสั่งต่อจากนี้
				mysql_query("SET NAMES UTF8"); // กำหนดค่าข้อมูลให้ ออกมาเป็น  UTF8
		    	mysql_select_db($dbname,$conn)or  die("ไม่สามารถติดต่อกับ Ms SQL ได้");//ถ้าไม่สามารถเชื่อมต่อได้ให้ แสดง "ข้อความ"
				//echo "xxxxxxxx";
			}else{
             die("ไม่สามารถติดต่อกับ Ms SQL ได้" . mysql_error());
             mysql_query("SET NAMES UTF8");
			}
  }



/*ฟังก์ชั่นปิด Connection ติดต่อกับ MYSQL Server */

  function CloseDB()
  {
   		global $conn;
			mysql_close($conn);
  }


	date_default_timezone_set('Asia/Bangkok'); //ตั้งเวลา sever ให้ตรง
	$update_time=date('Y-m-d H:i:s'); // รูปแบบของเวลา

?>
