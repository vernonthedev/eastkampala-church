<!DOCTYPE HTML>
<html class="no-js" lang="en">
<?php include "head.php";?>

<?php

include 'config.php';

?>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]>
<div class="body">
    <!-- Start Site Header -->
<?php include "header.php";?>
<!-- End Site Header -->
<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax" style="background-image:url(images/devotional-banner.jpeg); height: 477px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Inverse Bible Lesson</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Nav Backed Header -->
<!-- Start Page Header -->
<div class="page-header">
    <div class="container">
        <div class"row">
        <div class="col-md-12">
            <h1>Inverse Lesson</h1>
        </div>
    </div>
</div>
</div>

<!-- End Page Header -->
<!-- Start Content -->
<section>
    <div class="container">
        <div class="col-lg-8 col-md-8 ml-10 pl-49">
        <div class="mx-auto">
            <!-- Add the mx-auto class to center the content -->
            <h3 class="text-align-right text-muted">What about in God’s eyes? Where do you fit in God’s universe?</h3>
            <p>
                <blockquote>
                "My Identity in Christ seeks to help you answer these questions and more. All of us must choose for ourselves—What do we believe? Why be a Christian? We are made in the image of our Creator. And He thinks you’re valuable—in fact, He thinks you’re worth dying for.
            </p></blockquote>
            <div class="card">
                <div class="card-body ">
                    <table class="table table-dark table-borderless">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Inverse Lesson Title</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $sql = "SELECT * FROM uploaded_files ORDER BY id DESC";
                        $result = $conn->prepare($sql);
                        $result->execute();
                        $rows = $result->fetchAll();
                        $count =1;
                        foreach($rows as $row){

                            echo "<tr>";
                            echo "<td>".$count."</td>";
                            echo "<td>".'<ion-icon name="document" style="font-size: 20px;"></ion-icon>'.$row->filename."</td>";
                            echo '<td><a href="admin/uploads/files/'.$row->filename.'" class="btn btn-dark-outline" download> <ion-icon name="cloud-download" style="font-size: 20px;"></ion-icon> Download</a></td>';
                            echo "</tr>";
                            $count++;
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

<!-- Start Footer -->
<?php include "footer.php";?>
<!-- End Footer -->
<a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>
<?php include "script.php";?>
</body>
</html>
