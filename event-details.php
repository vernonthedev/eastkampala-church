<!DOCTYPE HTML>
<?php
include"head.php";

include'config.php';

$recv = $_GET['id'];

$sql = "SELECT * FROM event_list WHERE event_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$recv]);
$rows = $stmt->fetchAll();
foreach($rows as $row){
if($recv != $row->event_id){
    //show 404 page incase the user enters a value of page not available in the system
    http_response_code(404);
}else{
//formating the date into human-readable format
$eventDate = date("l, F j, Y", strtotime($row->event_date));
?>


<body>
<div class="body">
  <!-- Start Site Header -->
  <?php include "header.php";?>

  <!-- End Site Header -->
  <!-- Start Nav Backed Header -->
  <div class="nav-backed-header parallax">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="events.php">Events</a></li>
            <li class="active"><?php echo $row->event_title; ?></li>
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
        <div class="col-md-10 col-sm-10 col-xs-8">
          <h1>Events</h1>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-4"> <a href="events.php" class="pull-right btn btn-primary">All events</a> </div>
      </div>
    </div>
  </div>
  <!-- End Page Header -->

  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">


          <div class="col-md-9">
            <header class="single-post-header clearfix">
              <nav class="btn-toolbar pull-right"> <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Print" ><i class="fa fa-print"></i></a> <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Contact us" ><i class="fa fa-envelope"></i></a> <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Share event" ><i class="fa fa-location-arrow"></i></a> </nav>
              <h2 class="post-title"><?php echo $row->event_title; ?></h2>
            </header>
            <article class="post-content">
              <div class="event-description"> <img src="admin/events/<?php echo $row->event_img; ?>" class="img-responsive">
                <div class="spacer-20"></div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">Event details</h3>
                      </div>
                      <div class="panel-body">
                        <ul class="info-table">
                          <li><i class="fa fa-calendar"></i><?php echo $eventDate; ?> </li>
                          <li><i class="fa fa-map-marker"></i> <?php echo $row->event_place; ?></li>
                          <li><i class="fa fa-phone"></i> 1 800 321 4321</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <ul class="list-group">
                      <li class="list-group-item"> <span class="badge">14</span> Attendees </li>
                      <li class="list-group-item"> <span class="badge">4</span> Staff members </li>
                    </ul>
                  </div>
                </div>
                <p><?php echo $row->event_content; ?></p>
                <audio class="audio-player" id="player2" src="#" type="audio/mp3" controls></audio>
              </div>
            </article>
          </div>
          <!-- Start Sidebar -->
          <div class="col-md-3 sidebar">
            <div class="widget-upcoming-events widget">
              <div class="sidebar-widget-title">
                <h3>Upcoming Events</h3>
              </div>
              <ul>
                <li class="item event-item clearfix">
                  <div class="event-date"> <span class="date">06</span> <span class="month">Aug</span> </div>
                  <div class="event-detail">
                    <h4><a href="#">Monday Prayer</a></h4>
                    <span class="event-dayntime meta-data">Monday | 07:00 AM</span> </div>
                </li>
                <li class="item event-item clearfix">
                  <div class="event-date"> <span class="date">28</span> <span class="month">Aug</span> </div>
                  <div class="event-detail">
                    <h4><a href="#">Staff members meet</a></h4>
                    <span class="event-dayntime meta-data">Monday | 01:00 PM</span> </div>
                </li>
                <li class="item event-item clearfix">
                  <div class="event-date"> <span class="date">25</span> <span class="month">Sep</span> </div>
                  <div class="event-detail">
                    <h4><a href="#">Evening Prayer</a></h4>
                    <span class="event-dayntime meta-data">Friday | 06:00 PM</span> </div>
                </li>
              </ul>
            </div>
            <div class="widget sidebar-widget">
              <div class="sidebar-widget-title">
                <h3>Events Categories</h3>
              </div>
              <ul>
                <li><a href="#">Church Home</a> (9)</li>
                <li><a href="#">About Us</a> (24)</li>
                <li><a href="#">All Events</a> (13)</li>
                <li><a href="#">Sermons Archive</a> (23)</li>
                <li><a href="#">Our Ministries</a> (65)</li>
              </ul>
            </div>
            <!-- Recent Posts Widget -->
            <div class="widget-recent-posts widget">
              <div class="sidebar-widget-title">
                <h3>Recent Posts</h3>
              </div>
              <ul>
                <li class="clearfix"> <a href="#" class="media-box post-image"> <img src="http://placehold.it/800x600&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail"> </a>
                  <div class="widget-blog-content"><a href="#">Voluptatum deleniti atque corrupti voluptatum deleniti atque corrupti</a> <span class="meta-data"><i class="fa fa-calendar"></i> on 17th Dec, 2013</span> </div>
                </li>
                <li class="clearfix"> <a href="#" class="media-box post-image"> <img src="http://placehold.it/800x600&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail"> </a>
                  <div class="widget-blog-content"><a href="#">Voluptatum deleniti atque corrupti</a> <span class="meta-data"><i class="fa fa-calendar"></i> on 17th Dec, 2013</span> </div>
                </li>
                <li class="clearfix"> <a href="#" class="media-box post-image"> <img src="http://placehold.it/800x600&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail"> </a>
                  <div class="widget-blog-content"><a href="#">Voluptatum deleniti atque corrupti voluptatum deleniti atque corrupti</a> <span class="meta-data"><i class="fa fa-calendar"></i> on 17th Dec, 2013</span> </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Start Footer -->
<?php include "footer.php";?>
  <!-- End Footer -->
  <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>
<?php include "script.php";?>
</body>
</html>
<?php
}}
?>