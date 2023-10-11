<!DOCTYPE HTML>
<html class="no-js">
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
            <li><a href="index.html">Home</a></li>
            <li class="active">Contact</li>
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
          <h1>Contact</h1>
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
          <div class="col-md-9">
            <header class="single-post-header clearfix">
              <h2 class="post-title">Our Location</h2>
            </header>
            <div class="post-content">
              <div id="gmap">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.698171742032!2d32.635665874853665!3d0.44465329955100075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177db502e7023055%3A0xdf4e092e1234396c!2sSDA%20CHURCH%20EAST%20KAMPALA!5e0!3m2!1sen!2sug!4v1695277203494!5m2!1sen!2sug" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
              <div class="row">
                <form method="post" id="contactform" name="contactform" class="contact-form" action="mail/contact.php">
                  <div class="col-md-6 margin-15">
                    <div class="form-group">
                      <input type="text" id="name" name="name"  class="form-control input-lg" placeholder="Please Enter Your Full Name">
                    </div>
                    <div class="form-group">
                      <input type="email" id="email" name="email"  class="form-control input-lg" placeholder="Please Enter Your Email">
                    </div>
                    <div class="form-group">
                      <input type="number" id="phone" name="phone"  class="form-control input-lg" placeholder="Please Enter Your Phone Number">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <textarea cols="6" rows="7" id="comments" name="comments" class="form-control input-lg" placeholder="Please Enter your message"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <input id="submit" name="submit" type="submit" class="btn btn-primary btn-lg pull-right" value="Submit now!">
                  </div>
                </form>
                <div class="clearfix"></div>
                <div class="col-md-12">
                  <div id="message"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Sidebar -->
          <div class="col-md-3 sidebar">
            <!-- Recent Posts Widget -->
            <div class="widget-recent-posts widget">
              <div class="sidebar-widget-title">
                <h3>Weekly Fellowships</h3>
              </div>
              <ul>
                <li class="clearfix"> <a href="#" class="media-box post-image"> <img src="images/week.jpg" alt="" class="img"> </a>
                  <div class="widget-blog-content"><a href="#">Mid Week Fellowship</a> <span class="meta-data"><i class="fa fa-calendar"></i> every Wednesdays</span> </div>
                </li>
                <li class="clearfix"> <a href="#" class="media-box post-image"> <img src="images/week.jpg" alt="" class="img"> </a>
                  <div class="widget-blog-content"><a href="#">Friday Vespers</a> <span class="meta-data"><i class="fa fa-calendar"></i>every Friday</span> </div>
                </li>
                <li class="clearfix"> <a href="#" class="media-box post-image"> <img src="images/week.jpg" alt="" class="img"> </a>
                  <div class="widget-blog-content"><a href="#">Sunday Fellowship</a> <span class="meta-data"><i class="fa fa-calendar"></i> every Sunday</span> </div>
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
