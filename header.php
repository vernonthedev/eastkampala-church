<?php

$sql = "SELECT * FROM event_list ORDER BY event_id DESC LIMIT 3";
$run_query = $conn->prepare($sql);
$run_query->execute();
$rows = $run_query->fetchAll();


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
                <li><a href="index.php"><img src="images/icons/home.png" width="20px"/>Home</a>
                    <ul class="dropdown">
                        <li><a href="livestream.php"> <img src="images/icons/live.png" width="20px"/>Livestream</a></li>
                    </ul>
                </li>
                <li><a href="about.php"><img src="images/icons/about.png"/>About Us</a>
                  <ul class="dropdown">
                    <li><a href="about.php">Overview</a></li>
                    <li><a href="church-history.php">Our History</a></li>
                    <li><a href="our-staff.php">Our Pastors</a></li>
                	<li><a href="contact.php">Contact</a></li>
                  </ul>
                </li>
                <li class="megamenu"><a href="shortcodes.html"><img src="images/icons/ministry.png" width="20"/>Ministry</a>
                  <ul class="dropdown">
                    <li>
                      <div class="megamenu-container container">
                        <div class="row">
                          <div class="col-md-3 hidden-sm hidden-xs"> <span class="megamenu-sub-title"><i class="fa fa-bell"></i> Today's Prayer</span>
                            <iframe width="200" height="150" src="http://player.vimeo.com/video/19564018?title=0&amp;byline=0&amp;color=007F7B"></iframe>
                          </div>
                          <div class="col-md-3"> <span class="megamenu-sub-title"><i class="fa fa-pagelines"></i> Our Ministries</span>
                            <ul class="sub-menu">
                              <li><a href="womens-ministry.php">Women's Ministry</a></li>
                              <li><a href="mens-ministry.php">Men's Ministry</a></li>
                              <li><a href="childrens-ministry.php">Children's Ministry</a></li>
                              <li><a href="youth-ministry.php">Senior Youth Ministry</a></li>
                              <li><a href="#" data-bs-toggle="modal" data-bs-target="#prayerModal">Prayer Requests</a></li>
                            </ul>
                          </div>
                          <div class="col-md-3"> <span class="megamenu-sub-title"><i class="fa fa-clock-o"></i> Upcoming Events</span>
                            <ul class="sub-menu">
                                <?php
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
                                    <li><a href="event-details.php"> Personal Counselling <span class="meta-data">Login Here to Chat</span></a> </li>
                                    <li><a href="event-details.php">Prayer Band</a></li>
                                    <li><a href="event-details.php">Family and Marriage</a></li>
                                </ul>
                            </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li><a href="events.php"><img src="images/icons/events.png" width="20"/>Events</a>
                  <ul class="dropdown">
                    <li><a href="events.php">Events Organised</a></li>
                    <li><a href="announcements.php">Announcements</a></li>
                    <li><a href="bulletin.php">Sabbath Bulletin</a></li>
                  </ul>
                </li>
                <li><a href="sermons.php"><img src="images/icons/sermons.png" width="20"/>Sermons</a>
                  <ul class="dropdown">
                    <li><a href="sermon-albums.php">Sermons Archive</a></li>
                      <li><a href="daily-devotion.php">Daily Devotions</a></li>
                      <li><a href="inverse-devotions.php">Inverse Devotions</a></li>
                      <li><a href="adult-lesson.php">Adult Bible Lesson</a></li>
                      <li><a href="https://www.gracelink.net/kindergarten">Children's Lesson</a></li>

                  </ul>
                </li>
                <li><a href="gallery.php"><img src="images/icons/gallery.png" width="20"/>Images</a>
                  <ul class="dropdown">
                    <li><a href="gallery.php">Church Images</a></li>
                  </ul>
                </li>
                  <li><a href="gc.php"><img src="images/icons/global.png" width="20"/>Global</a>
                      <ul class="dropdown">
                          <li><a href="#">Global Youth Day</a></li>
                          <li><a href="#">Global Youth Congress</a></li>
                          <li><a href="#">World Pathfinder Day</a></li>
                          <li><a href="#">Public Campus Ministry Day</a></li>
                          <li><a href="#">Week of Prayer</a></li>
                          <li><a href="#"> e-Week of Prayer</a></li>
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
