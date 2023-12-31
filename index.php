<!DOCTYPE HTML>
<html class="no-js">
<?php
include "head.php";
include "config.php";
?>
<body>
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
                  <div class="col-md-4 col-sm-4 featured-block appear-animation bounceInLeft appear-animation-visible" data-appear-animation="bounceInLeft"  >
                      <a href="our-staff.php" class="img-thumbnail">
                          <img src="admin/team-images/<?php echo $row->member_img; ?>" alt="staff">
                          <strong>Our Pastors</strong>
                          <span class="more">read more</span>
                      </a>
                  </div>
              <?php } ?>


            <div class="col-md-4 col-sm-4 featured-block appear-animation bounceInLeft appear-animation-visible" data-appear-animation="bounceInLeft" > <a href="about.php" class="img-thumbnail"> <img src="images/new.jpg" width="600" height="200" alt="staff"> <strong>New Here</strong> <span class="more">read more</span> </a> </div>
            <div class="col-md-4 col-sm-4 featured-block appear-animation bounceInLeft appear-animation-visible" data-appear-animation="bounceInLeft" > <a href="sermon-albums.php" class="img-thumbnail"> <img src="images/sermon.jpg" width="600" alt="staff"> <strong>Sermons Archive</strong> <span class="more">read more</span> </a> </div>
          </div>
          <!-- End Featured Blocks -->
        </div>

          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-8 appear-animation bounceInRight appear-animation-visible" data-appear-animation="bounceInRight" >
                      <h2>Upcoming Sabbath Service</h2>

                      <div class="tabs">
                          <ul class="nav nav-tabs">
                              <li class="active"> <a data-toggle="tab" href="#themetab"><strong> Theme </strong></a> </li>
                              <li class=""> <a data-toggle="tab" href="#titletab"> <strong>Sermon Title</strong> </a> </li>
                              <li class=""> <a data-toggle="tab" href="#preachertab"> <strong>Preacher</strong> </a> </li>
                              <li class=""> <a data-toggle="tab" href="#texttab"> <strong>Key Text </strong></a> </li>
                              <li class=""> <a data-toggle="tab" href="#musictab"> <strong>Special Music </strong></a> </li>
                          </ul>
                          <?php
                          // Select the latest three events by event_id in descending order
                          $sql = "SELECT * FROM upcoming ORDER BY id DESC LIMIT 1";
                          $run_query = $conn->prepare($sql);
                          $run_query->execute();
                          $rows = $run_query->fetchAll();
                          foreach ($rows as $row){
                          ?>
                          <div class="tab-content">
                              <div id="themetab" class="tab-pane active">
                                  <p><?php echo $row->theme; ?></p>
                              </div>
                              <div id="titletab" class="tab-pane">
                                  <p><?php echo $row->sermon_title; ?></p>
                              </div>
                              <div id="preachertab" class="tab-pane">
                                  <p><?php echo $row->preacher; ?> </p>
                              </div>
                              <div id="texttab" class="tab-pane">
                                  <p><?php echo $row->key_text; ?> </p>
                              </div>
                              <div id="musictab" class="tab-pane ">
                                  <p><?php echo $row->music; ?> </p>
                              </div>
                          </div>
                          <?php
                          }
                          ?>
                      </div>
                  </div>
              </div>
          </div>


          <div class="row">
              <div class="col-md-8 appear-animation bounceInLeft appear-animation-visible" data-appear-animation="bounceInLeft" >
                  <h2>Total Member Involvement</h2>
<div class="alert alert-success fade in"> <a class="close" data-dismiss="alert" href="#">×</a> <strong>Reminder! </strong> Please Don't forget to come along with a friend this Sabbath. </div>
              </div>
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
                      <div class="col-md-4"> <a href="#" class="media-box"> <img src="images/icons/planner_500px.png" alt="" class="img-thumbnail" width="60px"> </a></div>
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
            <!-- Latest devotion -->
            <div class="listing sermons-listing">
                <?php
                $sql = "SELECT * FROM news ORDER BY news_id DESC LIMIT 1";
                $run_query = $conn->prepare($sql);
                $run_query->execute();
                $rows = $run_query->fetchAll();

                ?>

                <?php
                foreach($rows as $row){
                // Formatting the date into a human-readable format
                $newsDate = date("l, F j, Y", strtotime($row->news_date));
                ?>

              <header class="listing-header">
                <h3>Today's Devotion</h3>
              </header>
              <section class="listing-cont">
                <ul>
                  <li class="item sermon featured-sermon"> <span class="date"><?php echo $newsDate ?></span>
                    <h4><a href="sermon-details.php?id=<?php echo $row->news_id; ?>"><?php echo $row->news_title; ?></a></h4>
                    <div class="featured-sermon-video">
                        <a href="sermon-details.php?id=<?php echo $row->news_id; ?>">
                      <img width="200" height="550" src="admin/news-images/<?php echo $row->news_img; ?>" alt="<?php echo $row->news_title; ?>"/>
                        </a>
                    </div>
                    <p><?php echo $row->news_content; ?></p>
                      <div class="isermons-sermon-actions">
                          <ul>

                              <li class="isermons-dl-files">
                                  <a href="video-sermons.php">
                                  <img src="images/icons/video.png" width="30px" alt="Watch Video Sermons"/>
                                  </a>
                                  <a href="audio-sermons.php">
                                      <img src="images/icons/play_audio.png" width="30px" alt="Listen to audio devotion"/>
                                  </a>
                                  <a href="daily-devotion.php">
                                      <img src="images/icons/download.png" width="30px" alt="Download Daily Devotion" data-bs-toggle="tooltip" data-bs-placement="left" title data-bs-original-title="Download devotion"/>
                                  </a>
                              </li>

                          </ul>
                      </div>
                  </li>
                </ul>
              </section>
                <?php
                }
                ?>
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
                        <img src="admin/images-gallery/<?php echo $row['gallery_img']; ?>" alt="<?php echo $row['gallery_title']; ?>" width="400px" height="400px">
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
