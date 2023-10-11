<?php
include'config.php';

$recv = $_GET['id'];

$sql = "SELECT * FROM news WHERE news_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$recv]);
$rows = $stmt->fetchAll();
foreach($rows as $row){
if($recv != $row->news_id){
    //show 404 page incase the user enters a value of page not available in the system
    http_response_code(404);
}else{
?>


<!DOCTYPE HTML>
<html class="no-js" lang="en">
<?php include "head.php";?>
<body>
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
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
            <li><a href="daily-devotion.php">Daily Devotions</a></li>
            <li class="active">Daily Devotional Study</li>
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
          <h1>Today's Devotion</h1>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-4"> <a href="daily-devotion.php" class="pull-right btn btn-primary">All Devotions</a> </div>
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
              <h2 class="post-title"><?php echo $row->news_title; ?></h2>
            </header>
            <article class="post-content">
              <div class="video-container">
                <img src="admin/news-images/<?php echo $row->news_img; ?>" width="100%" class="img img-responsive"  alt="admin/news-images/<?php echo $row->news_title; ?>"/>
              </div>
              <p><?php echo $row->news_content; ?></p>
              <div class="post-meta"> <i class="fa fa-tags"></i> <a href="#"><?php echo $row->news_type; ?></a></div>
            </article>
          </div>
          <!-- Start Sidebar -->
          <div class="col-md-3 sidebar">

            <div class="widget sidebar-widget">
              <div class="sidebar-widget-title">
                <h3>Sermon Speaker</h3>
              </div>
              <ul>
                <li><a href="#"><?php echo $row->news_place; ?></a></li>

              </ul>
            </div>
            <div class="widget sidebar-widget">
              <div class="sidebar-widget-title">
                <h3>Sermon Tags</h3>
              </div>
              <div class="tag-cloud"> <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a href="#">Worship</a> <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a href="#">Worship</a> </div>
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