<?php
include "config.php";


?>

<!-- Start Site Header -->
  <header class="site-header">
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-8">
            <h1 class="logo"> <a href="index.html"><img src="images/east%20kampala%20logo.png" alt="East Kampala SDA Logo" width="120px"></a> </h1>
          </div>
          <div class="col-md-8 col-sm-6 col-xs-4">
            <ul class="top-navigation hidden-sm hidden-xs">
              <li><a href="plan-visit.php"><img src="images/icons/planner_500px.png" width="20px"/>Plan your visit</a></li>
              <li><a href="donate.php"><img src="images/icons/donate.png" width="20px"/>Donate Now</a></li>
            </ul>
            <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a> </div>
        </div>
      </div>
    </div>
    <div class="main-menu-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <nav class="navigation">
              <ul class="sf-menu">
                <li><a href="index.php">Home</a>
                    <ul class="dropdown">
                        <li><a href="livestream.php"> <img src="images/icons/live.png" width="20px"/>Livestream</a></li>
                    </ul>
                </li>
                <li><a href="about.php">About Us</a>
                  <ul class="dropdown">
                    <li><a href="about.php"><img src="images/icons/about.png"/>Overview</a></li>
                    <li><a href="church-history.php"><img src="images/icons/history.png"/>Our History</a></li>
                    <li><a href="our-staff.php"><img src="images/icons/pastors.png"/>Our Pastors</a></li>
                	<li><a href="contact.php"><img src="images/icons/contacts_20px.png"/>Contact</a></li>
                  </ul>
                </li>
                <li class="megamenu"><a href="shortcodes.html">Ministry</a>
                  <ul class="dropdown">
                    <li>
                      <div class="megamenu-container container">
                        <div class="row">

                          <div class="col-md-3 hidden-sm hidden-xs"> <span class="megamenu-sub-title"><i class="fa fa-bell"></i> Today's Prayer</span>
                              <?php
                              $sql = "SELECT * FROM prayers ORDER BY prayer_id DESC LIMIT 1";
                              $run_query = $conn->prepare($sql);
                              $run_query->execute();
                              $rows = $run_query->fetchAll();

                              foreach ($rows as $row){
                              ?>
                            <img width="200" height="150" src="admin/prayers-gallery/<?php echo $row->prayer_img; ?>"/>
                              <?php
                              }
                              ?>
                          </div>
                          <div class="col-md-3"> <span class="megamenu-sub-title"><i class="fa fa-pagelines"></i> Our Ministries</span>
                            <ul class="sub-menu">
                              <li><a href="womens-ministry.php"><img src="images/icons/ministry.png" width="20"/>Women's Ministry</a></li>
                              <li><a href="mens-ministry.php"><img src="images/icons/ministry.png" width="20"/>Men's Ministry</a></li>
                              <li><a href="childrens-ministry.php"><img src="images/icons/ministry.png" width="20"/>Children's Ministry</a></li>
                              <li><a href="youth-ministry.php"><img src="images/icons/ministry.png" width="20"/>Senior Youth Ministry</a></li>
                              <li><a href="#" data-bs-toggle="modal" data-bs-target="#prayerModal"><img src="images/icons/pray_20px.png" width="20"/>Prayer Requests</a></li>
                            </ul>
                          </div>
                          <div class="col-md-3"> <span class="megamenu-sub-title"><i class="fa fa-clock-o"></i> Upcoming Events</span>
                            <ul class="sub-menu">
                                <?php
                                $sql = "SELECT * FROM event_list ORDER BY event_id DESC LIMIT 3";
                                $run_query = $conn->prepare($sql);
                                $run_query->execute();
                                $rows = $run_query->fetchAll();
                                //loop through the retrieved programs
                                foreach($rows as $row){
                                //formating the date into human-readable format
                                $eventDate = date("l, F j, Y", strtotime($row->event_date));
                                ?>
                              <li><a href="event-details.php?id=<?php echo $row->event_id; ?>"><?php echo $row->event_title; ?></a> <span class="meta-data"><?php echo $eventDate?></span> </li>
                                <?php
                                }
                                ?>
                            </ul>
                          </div>
                            <div class="col-md-3"> <span class="megamenu-sub-title"><i class="fa fa-american-sign-language-interpreting"></i> Counselling Services</span>
                                <ul class="sub-menu">
                                    <li><a href="event-details.php"><img src="images/icons/counselor_20px.png"/> Personal Counselling <span class="meta-data">Login Here to Chat</span></a> </li>
                                    <li><a href="event-details.php"><img src="images/icons/pray_20px.png"/>Prayer Band</a></li>
                                    <li><a href="event-details.php"><img src="images/icons/family.png"/>Family and Marriage</a></li>
                                </ul>
                            </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li><a href="events.php">Events</a>
                  <ul class="dropdown">
                    <li><a href="events.php"><img src="images/icons/events.png" width="20"/>Events</a></li>
                    <li><a href="announcements.php"><img src="images/icons/announcements.png" width="20"/>Announcements</a></li>
                    <li><a href="bulletin.php"><img src="images/icons/bulletin.png" width="20"/>Bulletin</a></li>
                  </ul>
                </li>
                <li><a href="sermons.php">Sermons</a>
                  <ul class="dropdown">
                    <li><a href="sermon-albums.php"><img src="images/icons/sermons.png" width="20"/>Sermons Archive</a></li>
                      <li><a href="daily-devotion.php"><img src="images/icons/sermons.png" width="20"/>Daily Devotions</a></li>
                      <li><a href="inverse-devotions.php"><img src="images/icons/sermons.png" width="20"/>Inverse Lesson</a></li>
                      <li><a href="adult-lesson.php"><img src="images/icons/sermons.png" width="20"/>Adult Bible Lesson</a></li>
                      <li><a href="https://www.gracelink.net/kindergarten"><img src="images/icons/sermons.png" width="20"/>Children's Lesson</a></li>

                  </ul>
                </li>
                <li><a href="gallery.php">Gallery</a>
                </li>
                  <li><a href="gc.php">Global</a>
                      <ul class="dropdown">
                          <li><a href="#"><img src="images/icons/global.png" width="20"/>Global Youth Day</a></li>
                          <li><a href="#"><img src="images/icons/global.png" width="20"/>Global Youth Congress</a></li>
                          <li><a href="#"><img src="images/icons/global.png" width="20"/>World Pathfinder Day</a></li>
                          <li><a href="#"><img src="images/icons/global.png" width="20"/>Public Campus Ministry Day</a></li>
                          <li><a href="#"><img src="images/icons/global.png" width="20"/>Week of Prayer</a></li>
                          <li><a href="#"><img src="images/icons/global.png" width="20"/>e-Week of Prayer</a></li>
                      </ul>
                  </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Site Header -->
