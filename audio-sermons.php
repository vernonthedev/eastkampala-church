<!DOCTYPE HTML>
<html class="no-js" lang="en">
<?php
include "head.php";
include "config.php";
?>


<body>


<style>

    /* Customize the container for the audio player */
    .audio-player {
        width: 300px;

        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    }

    /* Style the audio controls */
    audio {
        width: 100%;
    }



</style>


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
                        <li class="active">Audio</li>
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
                    <h1>Audio Sermons</h1>
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
                            $sql = "SELECT * FROM audio_uploads ORDER BY id DESC LIMIT $itemsPerPage OFFSET $offset";
                            $run_query = $conn->prepare($sql);
                            $run_query->execute();
                            $rows = $run_query->fetchAll();
                            ?>

                            <?php
                            // Loop through the retrieved programs
                            foreach ($rows as $row) {
                                ?>
                                <li class="grid-item format-standard card bg-success">
                                    <div class="grid-item-inner  ">

                                        <blockquote  >
                                        <audio controls>
                                            <source src="admin/uploads/audios/<?php echo $row->audio_name?>" type="audio/mp3">
                                            Your browser does not support the audio element.
                                        </audio>
                                        </blockquote>
                                        <div class="grid-content">
                                            <h3><?php echo $row->audio_name; ?></h3>
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
