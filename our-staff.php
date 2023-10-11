<!DOCTYPE HTML>
<html class="no-js" lang="en">
<?php include 'head.php';
include "config.php";?>
<body>
<div class="body">
  <!-- Start Site Header -->
  <?php include "header.php";?>
  <!-- End Site Header -->

  <!-- Start Nav Backed Header -->
  <div class="nav-backed-header parallax" style="background-image:url(http://placehold.it/1280x635&amp;text=IMAGE+PLACEHOLDER);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li class="active">Pastors</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- End Nav Backed Header -->
  <!-- Start Page Header -->
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Our Pastors and Elders</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page Header -->
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">

            <?php
            //SELECTING ALL THE CHURCH MEMBER HEADS
            $view_data = "SELECT * FROM member_list";
            $run_query = $conn->prepare($view_data);
            $run_query->execute();
            ?>

                <?php
                $rows = $run_query->fetchAll();
                foreach($rows as $row){
                ?>

          <div class="col-md-4 col-sm-4">
            <div class="grid-item staff-item">
              <div class="grid-item-inner">
                <div class="media-box"> <img src="admin/team-images/<?php echo $row->member_img; ?>" alt="" width="500" height="700px"> </div>
                <div class="grid-content">
                  <h3><?php echo $row->member_name;?></h3>
                  <nav class="social-icons"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> </nav>
                  <p><?php echo $row->member_title; ?></p>
                </div>
              </div>
            </div>
          </div>
                    <?php
                }
                ?>







        </div>
      </div>
    </div>
  </div>
  <!-- Start Footer -->
<?php include "footer.php";?>
  <!-- End Footer -->
  <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>
<script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call -->
<script src="plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin -->
<script src="js/helper-plugins.js"></script> <!-- Plugins -->
<script src="js/bootstrap.js"></script> <!-- UI -->
<script src="js/waypoints.js"></script> <!-- Waypoints -->
<script src="plugins/mediaelement/mediaelement-and-player.min.js"></script> <!-- MediaElements -->
<script src="js/init.js"></script> <!-- All Scripts -->
<script src="plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
<script src="plugins/countdown/js/jquery.countdown.min.js"></script> <!-- Jquery Timer -->
</body>
</html>
