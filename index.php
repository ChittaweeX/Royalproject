<?php
include_once('database/connect.php');
ConnDB();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>โครงการหลวง : Royalproject</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      #map { height: 1000px }
    </style>
</head>

<body>
    <!-- Navigation -->

    <!-- Page Content -->
    <div class="container-fluid">
      <div class="page-header">
      <h1>โครงการพระราชดำริ <small>RoyalProject </small></h1>
      </div>
    
        <div class="row">


            <div class="col-md-3">
                <p class="lead">ประเภทโครงการ</p>
                <div class="list-group">
                    <a href="#" class="list-group-item ">ประเภท น้ำ</a>
                    <a href="#" class="list-group-item">ประเภท ป่า</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>

                <p class="lead">แบ่งตามภาค</p>
                <div class="list-group">
                    <a href="#" class="list-group-item ">ภาคเหนือ</a>
                    <a href="#" class="list-group-item">ภาคตะวันออกเฉียงเหนือ</a>
                    <a href="#" class="list-group-item">ภาคกลาง</a>
                    <a href="#" class="list-group-item">ภาคตะวันออก</a>
                    <a href="#" class="list-group-item">ภาคตะวันตก</a>
                    <a href="#" class="list-group-item">ภาคใต้</a>
                </div>

                <p class="lead">โครงการทั้งหมด</p>
                <div class="list-group">
                    <a href="#" class="list-group-item active">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div>



            <div class="col-md-9">


                <div id="map" class="thumbnail">

                </div>



            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                    <a href="backend/login.php">ผู้ดูแลระบบ</a>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
    <script>

// The following example creates complex markers to indicate beaches near
// Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
// to the base of the flagpole.

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 6,
    mapTypeControl: true,
    center: {lat: 10.431092, lng: 100.557861},
    scaleControl: false,
    scrollwheel: false,
    panControl: false,
    disableDefaultUI:true,
    disableDoubleClickZoom : true

  });

  setMarkers(map,locations);



}



// Data for the markers consisting of a name, a LatLng and a zIndex for the
// order in which these markers should display on top of each other.
var locations = [
  <?php
                $sql = "SELECT * FROM  project";

  $result = mysql_db_query($dbname, $sql);

  $i = 1;
  while($row = mysql_fetch_array($result))

  { ?>

  ['<?php echo $row['project_name']; ?>', <?php echo $row['project_lat'] ?>, <?php echo $row['project_long'] ?>, '<?php echo $row['project_detail'] ?>'],


  <?php } ?>


  ];

function setMarkers(map,locations){

    var marker, i

for (i = 0; i < locations.length; i++)
{

var loan = locations[i][0]
var lat = locations[i][1]
var long = locations[i][2]
var add =  locations[i][3]

latlngset = new google.maps.LatLng(lat, long);

var marker = new google.maps.Marker({
        map: map,
        title: loan ,
        animation: google.maps.Animation.DROP,
        position: latlngset
      });

      var chHtml ="<h3><a href='http://en.wikipedia.org/wiki/Chicago,_Illinois'"
+" target='_blank'>"+loan+"</a></h3><div>"
+"<img src='http://upload.wikimedia.org/wikipedia/commons/thumb/0/06/20070909_"
+"Chicago_Half_Marathon.JPG/220px-20070909_Chicago_Half_Marathon.JPG'"
+" width='220' hieght='174' />"
+"</div><div>Chicago is the largest city in the U.S. state of Illinois.</div>";



      var content = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">'+loan+'</h1>'+
      '<div id="bodyContent">'+
      '<p>'+add+'</p>'+
      '<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>'+
      '</div>'+
      '</div>';

var infowindow = new google.maps.InfoWindow();



google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){
      return function() {
         infowindow.setContent(content);
         infowindow.open(map,marker);



      };
  })(marker,content,infowindow));



  google.maps.event.addListener(marker,'mouseover', (function(marker,content,infowindow){
        return function() {

          marker.setAnimation(google.maps.Animation.BOUNCE);


        };
    })(marker,content,infowindow));

    google.maps.event.addListener(marker,'mouseout', (function(marker,content,infowindow){
          return function() {

            marker.setAnimation();


          };
      })(marker,content,infowindow));








}



}


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0w20zmYQ6kyOlrtcQyR4zn_WD4MhOHcQ&callback=initMap"
        async defer></script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          ...
        </div>
      </div>
    </div>
</body>

</html>
