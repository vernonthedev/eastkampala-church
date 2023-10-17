<!DOCTYPE HTML>
<html class="no-js">
<?php
include "head.php";
include "config.php";
?>
<body>
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
<?php include 'header.php';?>
    <!-- Start Hero Slider -->
    <div class="hero-slider flexslider clearfix" data-autoplay="yes" data-pagination="yes" data-arrows="yes" data-style="fade" data-pause="yes">
        <ul class="slides">
            <?php
            $view_banners = "SELECT * FROM banner_slider";
            $stmt = $conn->prepare($view_banners);
            $stmt->execute();
            $rows = $stmt->fetchAll();

            foreach($rows as $row){
            ?>
            <li class=" parallax" style="background-image:url(admin/banner/<?php echo $row->banner_img;?>);"></li><?php
            }
            ?>
        </ul>
    </div>
    <!-- End Hero Slider -->
    <div class="notice-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6 notice-bar-title"> <span class="notice-bar-title-icon hidden-xs"><i class="fa fa-calendar fa-3x"></i></span> <span class="title-note">Next</span> <strong>Upcoming Event</strong> </div>
                <div class="col-md-3 col-sm-6 col-xs-6 notice-bar-event-title">
                    <h5><a href="single-event.html">Sountheast Asia Meet</a></h5>
                    <span class="meta-data">13th July, 2015</span> </div>
                <div id="counter" class="col-md-4 col-sm-6 col-xs-12 counter" data-date="July 13, 2018" style="opacity: 0.5;">
                    <div class="timer-col"> <span id="days">0</span> <span class="timer-type">days</span> </div>
                    <div class="timer-col"> <span id="hours">00</span> <span class="timer-type">hrs</span> </div>
                    <div class="timer-col"> <span id="minutes">00</span> <span class="timer-type">mins</span> </div>
                    <div class="timer-col"> <span id="seconds">00</span> <span class="timer-type">secs</span> </div>
                </div>
                <div class="col-md-2 col-sm-6 hidden-xs"> <a href="events.html" class="btn btn-primary btn-lg btn-block">All Events</a> </div>
            </div>
        </div>
    </div>
    <!-- End Notice Bar -->
    <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <!-- Start Featured Blocks -->
          <div class="featured-blocks clearfix">
              <?php
              // Select the latest member by ordering the results by a column (e.g., member_id) in descending order
              $view_data = "SELECT * FROM member_list ORDER BY member_id DESC LIMIT 1";
              $run_query = $conn->prepare($view_data);
              $run_query->execute();
              $rows = $run_query->fetchAll();
              foreach ($rows as $row) {
                  ?>
                  <div class="col-md-4 col-sm-4 featured-block">
                      <a href="our-staff.php" class="img-thumbnail">
                          <img src="admin/team-images/<?php echo $row->member_img; ?>" alt="staff">
                          <strong>Our Pastors</strong>
                          <span class="more">read more</span>
                      </a>
                  </div>
              <?php } ?>


            <div class="col-md-4 col-sm-4 featured-block"> <a href="about.php" class="img-thumbnail"> <img src="images/new.jpg" width="600" height="200" alt="staff"> <strong>New Here</strong> <span class="more">read more</span> </a> </div>
            <div class="col-md-4 col-sm-4 featured-block"> <a href="sermons.php" class="img-thumbnail"> <img src="images/sermon.jpg" width="600" alt="staff"> <strong>Sermons Archive</strong> <span class="more">read more</span> </a> </div>
          </div>
          <!-- End Featured Blocks -->
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-6">
            <!-- Events Listing -->
            <div class="listing events-listing">
              <header class="listing-header">
                <h3>More Coming Events</h3>
              </header>
              <section class="listing-cont">
                <ul>
                    <?php
                    include 'config.php';

                    // Select the latest three events by event_id in descending order
                    $sql = "SELECT * FROM event_list ORDER BY event_id DESC LIMIT 3";
                    $run_query = $conn->prepare($sql);
                    $run_query->execute();
                    $rows = $run_query->fetchAll();

                    //loop through the retrieved programs
                    foreach($rows as $row){
                    //formating the date into human-readable format
                    $eventDate = date("l, F j, Y", strtotime($row->event_date));
                    ?>

                  <li class="item event-item">
                    <div class="event-date"> <span class="date"><ion-icon name="calendar-sharp" size="large"></ion-icon></span> </div>
                    <div class="event-detail">
                      <h4><a href="event-details.php?id=<?php echo $row->event_id; ?>"><?php echo $row->event_title;?></a></h4>
                      <span class="event-dayntime meta-data"><?php echo $eventDate;?></span> </div>
                    <div class="to-event-url">
                      <div><a href="event-details.php?id=<?php echo $row->event_id; ?>" class="btn btn-default btn-sm">Details</a></div>
                    </div>
                  </li>

                        <?php
                    }
                    ?>

                </ul>
              </section>
            </div>
            <div class="spacer-30"></div>
            <!-- Latest News -->
            <div class="listing post-listing">
              <header class="listing-header">
                <h3>Latest Announcements</h3>
              </header>
              <section class="listing-cont">
                <ul>
                    <?php
                    $sql = "SELECT * FROM announcements ORDER BY ann_id DESC LIMIT 3";
                    $run_query = $conn->prepare($sql);
                    $run_query->execute();
                    $rows = $run_query->fetchAll();

                    foreach ($rows as $row){
                    ?>
                  <li class="item post">
                    <div class="row">
                      <div class="col-md-4"> <a href="#" class="media-box"> <img src="images/annouce.jpg" alt="" class="img-thumbnail" width="60px"> </a></div>
                      <div class="col-md-8">
                        <div class="post-title">
                          <h2><a href="announcements.php"><?php echo $row->ann_title; ?></a></h2>
                        <p><?php echo $row->ann_content; ?></p>
                      </div>
                    </div>
                  </li>
                    <?php
                    }
                    ?>

                </ul>
              </section>
            </div>
          </div>
          <!-- Start Sidebar -->
          <div class="col-md-4 col-sm-6">
            <!-- Latest Sermons -->
            <div class="listing sermons-listing">
              <header class="listing-header">
                <h3>Recent Devotion</h3>
              </header>
              <section class="listing-cont">
                <ul>
                  <li class="item sermon featured-sermon"> <span class="date">Feb 14, 2014</span>
                    <h4><a href="sermon-details.php">How To Recover The Cutting Edge</a></h4>
                    <div class="featured-sermon-video">
                      <iframe width="200" height="150" src="http://player.vimeo.com/video/19564018?title=0&amp;byline=0&amp;color=007F7B"></iframe>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis consectetur adipiscing elit. Nulla convallis egestas rhoncus</p>
                      <div class="isermons-sermon-actions">
                          <ul>
                              <li class="isermons-pl-video isermons-pl-va"><a href="#isermons-video-modal2445" class="isermons-tip-top-left isermons-tip-rounded" tooltip-label="Play Video"><i class="isermons-icon-social-youtube"></i></a></li>

                              <li class="isermons-pl-audio isermons-pl-va"><a href="#isermons-audio-modal2445" class="isermons-tip-top-left isermons-tip-rounded" tooltip-label="Play Audio"><i class="isermons-icon-microphone"></i></a></li>

                              <li class="isermons-dl-files">
                                  <ion-icon name="logo-youtube" size="large" aria-label="Favorite"></ion-icon>
                                  <ion-icon name="mic-outline" size="large"></ion-icon>
                                  <ion-icon name="cloud-download-outline" size="large"></ion-icon>
                              </li>

                          </ul>
                      </div>
                  </li>
                  <li class="item sermon">
                    <h2 class="sermon-title"><a href="sermon-details.php">Voluptatum deleniti atque corrupti</a></h2>
                    <span class="meta-data"><i class="fa fa-calendar"></i> on 17th Dec, 2013</span> </li>
                  <li class="item sermon">
                    <h2 class="sermon-title"><a href="sermon-details.php">Voluptatum deleniti atque corrupti</a></h2>
                    <span class="meta-data"><i class="fa fa-calendar"></i> on 17th Dec, 2013</span> </li>
                  <li class="item sermon">
                    <h2 class="sermon-title"><a href="sermon-details.php">Voluptatum deleniti atque corrupti</a></h2>
                    <span class="meta-data"><i class="fa fa-calendar"></i> on 17th Dec, 2013</span> </li>
                </ul>
              </section>
            </div>
          </div
        </div>
      </div>
    </div>
  </div>
  <!-- Start Featured Gallery -->
  <div class="featured-gallery">
    <div class="container">
      <div class="row">

        <div class="col-md-3 col-sm-3">
          <h4>Updates from our gallery</h4>
        </div>
            <?php
            // Fetch the 3 latest images from the galleries table
            $sql = "SELECT * FROM image_gallery ORDER BY gallery_id DESC LIMIT 3";
            $viewing_img = $conn->prepare($sql);
            $viewing_img->execute();

            while ($row = $viewing_img->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="col-md-3 col-sm-3 post format-image">
                    <a href="admin/images-gallery/<?php echo $row['gallery_img']; ?>" class="media-box" data-rel="prettyPhoto[Gallery]">
                        <img src="admin/images-gallery/<?php echo $row['gallery_img']; ?>" alt="<?php echo $row['gallery_title']; ?>" width="400px">
                    </a>
                </div>

                <?php
            }
            ?>

      </div>
    </div>
  </div>
  <!-- End Featured Gallery -->
  <!-- Start Footer -->
<?php include "footer.php";?>
  <!-- End Footer -->
  <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> </div>
<?php include "script.php";?>
</body>
</html>
