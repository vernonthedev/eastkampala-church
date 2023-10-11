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
  <div class="nav-backed-header parallax">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
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
                <form method="post" id="contactform" name="contactform" class="contact-form" action="">
                  <div class="col-md-6 margin-15">
                    <div class="form-group">
                      <input type="text" id="name" name="name"  class="form-control input-lg" placeholder=" Your Full Name">
                    </div>
                    <div class="form-group">
                      <input type="email" id="email" name="email"  class="form-control input-lg" placeholder=" Your Email">
                    </div>
                    <div class="form-group">
                      <input type="number" id="phone" name="phone"  class="form-control input-lg" placeholder=" Your Phone Number">
                    </div>
                      <div class="form-group">
                          <input type="text" id="subject" name="subject"  class="form-control input-lg" placeholder="Prayer Request, Suggestion,Inquiries">
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>



<?php
include "config.php";

if(!$_POST) exit;

if (isset($_POST['submit'])) {
// Email address verification, do not edit.
    function isEmail($email)
    {
        return (preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email));
    }

    if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $comments = $_POST['comments'];
    $subject = $_POST['subject'];

    if (trim($name) == '') {
        echo '<div class="alert alert-error">You must enter your name.</div>';
        exit();
    } else if (trim($email) == '') {
        echo '<div class="alert alert-error">You must enter email address.</div>';
        exit();
    } else if (!isEmail($email)) {
        echo '<div class="alert alert-error">You must enter a valid email address.</div>';
        exit();
    }



    $c_inquiry = "INSERT INTO contact_inquiry(c_id, c_name, c_email, c_phone, c_subject, c_massage) VALUES(?, ?, ?, ?, ?, ?)";
    $run_query = $conn->prepare($c_inquiry);
    $run_query->execute(['',$name, $email, $phone, $subject, $comments]);

    if ($run_query && $run_query->rowCount() > 0){
        echo '<script>swal("Completed","Your Inquiry has been sent successfully to our administrators.", "success");</script>';
    }
    else{
        echo '<script>swal("Failed", "Inquiry has not been sent.");</script>';
    }

}

?>
