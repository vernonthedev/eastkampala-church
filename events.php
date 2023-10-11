<!DOCTYPE HTML>
<html class="no-js" lang="en">
<?php
include "head.php";
include "config.php";
?>

<?php
include 'config.php';

$sql = "SELECT * FROM event_list ORDER BY event_id DESC";
$run_query = $conn->prepare($sql);
$run_query->execute();
$rows = $run_query->fetchAll();
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
            <li class="active">Events</li>
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
          <h1>Organised Events</h1>
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
          <div class="col-md-12">
            <ul class="grid-holder col-3 events-grid">

                <?php
                //loop through the retrieved programs
                foreach($rows as $row){
                    //formating the date into human-readable format
                    $eventDate = date("l, F j, Y", strtotime($row->event_date));
                ?>

              <li class="grid-item format-standard">
                <div class="grid-item-inner"> <a href="event-details.php?id=<?php echo $row->event_id; ?>" class="media-box"> <img src="admin/events/<?php echo $row->event_img; ?>" width="600" height="600"  alt="<?php echo $row->event_title; ?>"> </a>
                  <div class="grid-content">
                    <h3><a href="event-details.php?id=<?php echo $row->event_id; ?>"><?php echo $row->event_title; ?></a></h3>
                    <p><?php echo $row->event_content; ?></p>
                  </div>
                  <ul class="info-table">
                    <li><i class="fa fa-calendar"></i><?php echo $eventDate?></li>
                    <li><i class="fa fa-map-marker"></i> <?php echo $row->event_place?></li>
                  </ul>
                </div>
              </li>
                    <?php
                }
                ?>


            </ul>
            <ul class="pager pull-right">
              <li><a href="#">&larr; Older</a></li>
              <li><a href="#">Newer &rarr;</a></li>
            </ul>
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
