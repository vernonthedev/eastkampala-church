<!DOCTYPE HTML>
<html class="no-js" lang="en">
<?php include "head.php";?>

<?php

include 'config.php';

$sql = "SELECT * FROM uploaded_files ORDER BY id DESC";
$result = $conn->prepare($sql);
$result->execute();
$rows = $result->fetchAll();



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
<div class="nav-backed-header parallax" style="background-image:url(http://placehold.it/1280x635&amp;text=IMAGE+PLACEHOLDER);">
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
        <div class="mx-auto"> <!-- Add the mx-auto class to center the content -->
            <div class="card">
                <div class="card-body">
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
                        $count =1;
                        foreach($rows as $row){

                            echo "<tr>";
                            echo "<td>".$count."</td>";
                            echo "<td>".'<ion-icon name="document" style="font-size: 20px;"></ion-icon>'.$row->filename."</td>";
                            echo '<td><a href="admin/uploads/files/'.$row->filename.'" class="btn btn-dark" download> <ion-icon name="cloud-download" style="font-size: 20px;"></ion-icon> Download</a></td>';
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
