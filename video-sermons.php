<!DOCTYPE HTML>
<html class="no-js" lang="en">
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
    <div class="nav-backed-header parallax" style="background-image:url(http://placehold.it/1280x635&amp;text=IMAGE+PLACEHOLDER);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Videos</li>
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
                    <h1>Video Sermons</h1>
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
                            // Define the number of items to display per page
                            $itemsPerPage = 10;

                            // Determine the current page number
                            if (isset($_GET['page'])) {
                                $currentPage = $_GET['page'];
                            } else {
                                $currentPage = 1;
                            }

                            // Calculate the offset to start fetching records
                            $offset = ($currentPage - 1) * $itemsPerPage;

                            // Retrieve records for the current page
                            $sql = "SELECT * FROM video_gallery ORDER BY video_id DESC LIMIT $itemsPerPage OFFSET $offset";
                            $run_query = $conn->prepare($sql);
                            $run_query->execute();
                            $rows = $run_query->fetchAll();
                            ?>
                            <?php
                            // Loop through the retrieved programs
                            foreach ($rows as $row) {
                                ?>
                                <li class="grid-item format-standard">
                                    <div class="grid-item-inner">
                                        <video width="100%" controls>
                                            <source src="admin/videos-gallery/<?php echo $row->video_location; ?>" type="video/mp4" />
                                        </video>
                                        <div class="grid-content">
                                            <h3><?php echo $row->video_title; ?></h3>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <ul class="pager pull-right">
                            <?php
                            // Generate "Older" link
                            if ($currentPage > 1) {
                                echo '<li><a href="?page=' . ($currentPage - 1) . '">&larr; Older</a></li>';
                            }
                            // Generate "Newer" link
                            if (count($rows) === $itemsPerPage) {
                                echo '<li><a href="?page=' . ($currentPage + 1) . '">Newer &rarr;</a></li>';
                            }
                            ?>
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
