<?php
include_once('../database/connect.php');
ConnDB();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Controlpanel Royalproject</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <style >
    body {
  padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
}

.img-center {
margin: 0 auto;
}

footer {
  margin: 50px 0;
}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Royalproject backend</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <a href="../controller/logout.php" onclick="return confirm('กรุณายืนยันอีกครั้ง !!!')" class="btn btn-danger" style="margin-top:10px;">ออกจากระบบ</a>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Introduction Row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">โครงการหลวง Royalproject
                    <small>backend ControlPanal</small>
                </h1>
            </div>
        </div>

        <!-- Team Members Row -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">สวัสดี คุณ <?php  echo $_SESSION['userName']; ?> จัดการโครงการหลวง </h2>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  เพิ่มโครงการใหม่ +
                </button>
            </div>



<div class="collapse" id="collapseExample">

  <div class="col-lg-12">
    <br>
    <form action="../controller/InsertProjectController.php" method="post">
  <div class="form-group">
    <label >ชื่อโครงการ</label>
    <input type="text" class="form-control" name="projectname">
  </div>
  <div class="form-group">
    <label >รูปภาพ</label>
    <input type="file" >
    <p class="help-block">ยังไม่สามารถใช้งานได้</p>
  </div>
  <div class="form-group">
    <label >รายละเอียด</label>
    <textarea name="projectdetail" rows="8" cols="40" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label >ละติจูด</label>
    <input type="text" name="projectlat" class="form-control">
  </div>
  <div class="form-group">
    <label >ลองติจูด</label>
    <input type="text" name="projectlong" class="form-control">
  </div>
  <button type="submit" class="btn btn-success btn-lg">บันทึก</button>
</form>
  </div>
</div>


        </div>

        <hr>

        <div class="row">
          <div class="col-lg-12 table-responsive">
            <table class="table table-bordered">
              <thead>
                <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>รูปถาพ</th>
                <th>lat</th>
                <th>long</th>
                <th>Action</th>
              </thead>
              <tbody>

                <?php
                $sql = "SELECT * FROM  project"; //สร้างชุดคำสั่งในการดึงข้อมูลออกมา

			$result = mysql_db_query($dbname, $sql); //เอาชุดคำสั่งมาทำการค้นหาในฐานข้อมูล

			$i = 1;
			while($row = mysql_fetch_array($result)) //นำข้อมูลที่ได้มาวน loop จนกว่าจะหมด

			{


				?>

                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['project_name'] ?></td>
                  <td><?php echo "null" ?></td>
                  <td><?php echo $row['project_lat'] ?></td>
                  <td><?php echo $row['project_long'] ?></td>
                  <td><a href="#" class="btn btn-warning" data-toggle="modal" data-target="#project<?php echo $row['project_ID'] ?>">แก้ไข <i class="fa fa-wrench"></i></a>
                    <a href="../controller/DeleteProjectController.php?deleteID=<?php echo $row['project_ID'] ?>" onclick="return confirm('กรุณายืนยันการลบอีกครั้ง !!!')" class="btn btn-danger">ลบ <i class="fa fa-times-circle"></i></a></td>
                </tr>
        <?php $i++; } ?>
              </tbody>
            </table>
          </div>

        </div>
        <!-- สร้าง popup -->

        <?php
        $sql = "SELECT * FROM  project"; //สร้างชุดคำสั่งในการดึงข้อมูลออกมา

$result = mysql_db_query($dbname, $sql); //เอาชุดคำสั่งมาทำการค้นหาในฐานข้อมูล

$i = 1;
while($row = mysql_fetch_array($result)) //นำข้อมูลที่ได้มาวน loop จนกว่าจะหมด

{


?>

        <div class="modal fade" id="project<?php echo $row['project_ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $row['project_name'] ?></h4>
      </div>
      <div class="modal-body">
        <form action="../controller/UpdateProjectController.php" method="post"> <!--ส่งไปทำการ  UPdate -->
          <input type="hidden" name="projectid" value="<?php echo $row['project_ID'] ?>">
      <div class="form-group">
        <label >ชื่อโครงการ</label>
        <input type="text" class="form-control" name="projectname" value="<?php echo $row['project_name'] ?>">
      </div>
      <div class="form-group">
        <label >รูปภาพ</label>
        <input type="file" >
        <p class="help-block">ยังไม่สามารถใช้งานได้</p>
      </div>
      <div class="form-group">
        <label >รายละเอียด</label>
        <textarea name="projectdetail" rows="8" cols="40" class="form-control">
        <?php echo $row['project_detail'] ?></textarea>
      </div>
      <div class="form-group">
        <label >ละติจูด</label>
        <input type="text" name="projectlat" class="form-control" value="<?php echo $row['project_lat'] ?>">
      </div>
      <div class="form-group">
        <label >ลองติจูด</label>
        <input type="text" name="projectlong" class="form-control" value="<?php echo $row['project_long'] ?>">
      </div>
      <button type="submit" class="btn btn-success btn-lg">บันทึก</button>
    </form>
      </div>
            </div>
          </div>
        </div>

        <?php  } ?>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
