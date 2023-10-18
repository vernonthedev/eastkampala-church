<!DOCTYPE HTML>
<html class="no-js">
<?php
include "head.php";
include "config.php";
?>



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
                        <li class="active">Announcements</li>
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
                    <h1>Announcements</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Start Content -->
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <ul class="timeline">
                    <?php

                    $sql = "SELECT * FROM announcements ORDER BY ann_id DESC";
                    $run_query = $conn->prepare($sql);
                    $run_query->execute();
                    $rows = $run_query->fetchAll();
                    ?>
                    <?php
                    $isInverted = false; // Initialize the flag to false
                    foreach ($rows as $row) {
                        // Check if the card should be inverted or not
                        if ($isInverted) {
                            echo '<li class="timeline-inverted">';
                        } else {
                            echo '<li>';
                        }
                        ?>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h3 class="timeline-title"><a href="single-event."><?php echo $row->ann_title; ?></a></h3>
                            </div>
                            <div class="timeline-body">
                                <ul class="info-table">
                                    <li><ion-icon name="newspaper-outline" size="large"></ion-icon> <strong><?php echo $row->ann_content; ?></strong></li>
                                </ul>
                            </div>
                        </div>
                        </li>
                        <?php
                        $isInverted = !$isInverted; // Toggle the flag for the next iteration
                    }
                    ?>
                </ul>
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