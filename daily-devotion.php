<!DOCTYPE HTML>
<html class="no-js" lang="en">
<?php include "head.php"; ?>
<body>
<?php
include 'config.php';

// Pagination setup
$itemsPerPage = 7;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $itemsPerPage;

$sql = "SELECT * FROM news ORDER BY news_id DESC LIMIT $offset, $itemsPerPage";
$run_query = $conn->prepare($sql);
$run_query->execute();
$rows = $run_query->fetchAll();

?>

<div class="body">
    <!-- Start Site Header -->
    <?php include "header.php"; ?>
    <!-- End Site Header -->
    <!-- Start Nav Backed Header -->
    <div class="nav-backed-header parallax" style="background-image:url(http://placehold.it/1280x635&amp;text=IMAGE+PLACEHOLDER);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class "breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Daily Devotions</li>
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
                    <h1>Daily Devotions</h1>
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
                    <div class="col-md-8 sermon-archive">
                        <!-- Sermons Listing -->
                        <?php
                        foreach($rows as $row){
                            // Formatting the date into a human-readable format
                            $newsDate = date("l, F j, Y", strtotime($row->news_date));
                            ?>
                            <article class="post sermon">
                                <header class="post-title">
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9">
                                            <h3><a href="sermon-details.php?id=<?php echo $row->news_id; ?>"><?php echo $row->news_title; ?></a></h3>
                                            <span class="meta-data"><i class="fa fa-calendar"></i> <?php echo $newsDate ?> <a href="#">by <?php echo $row->news_place; ?></a></span>
                                        </div>
                                        <div class="col-md-3 col-sm-3 sermon-actions">
                                            <a href="#" data-placement="top" data-toggle="tooltip" data-original-title="Video"><i class="fa fa-video-camera"></i></a>
                                            <a href="#" data-placement="top" data-toggle="tooltip" data-original-title="Audio"><i class="fa fa-headphones"></i></a>
                                            <a href="#" data-placement="top" data-toggle="tooltip" data-original-title="Read online"><i class="fa fa-file-text-o"></i></a>
                                            <a href="#" data-placement="top" data-toggle="tooltip" data-original-title="Download PDF"><i class="fa fa-book"></i></a>
                                        </div>
                                    </div>
                                </header>
                                <div class="post-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="sermon-details.php" class="media-box">
                                                <img src="admin/news-images/<?php echo $row->news_img; ?>" alt="admin/news-images/<?php echo $row->news_title; ?>" class="img-thumbnail">
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?php echo $row->news_content; ?></p>
                                            <p><a href="sermon-details.php?id=<?php echo $row->news_id; ?>" class="btn btn-primary">Continue reading <i class="fa fa-long-arrow-right"></i></a></p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php
                        }
                        ?>

                        <ul class="pagination">
                            <?php
                            $total_records = $conn->query("SELECT COUNT(*) FROM news")->fetchColumn();
                            $total_pages = ceil($total_records / $itemsPerPage);

                            for ($page = 1; $page <= $total_pages; $page++) {
                                echo "<li" . ($page == $current_page ? ' class="active"' : '') . ">";
                                echo "<a href='daily-devotions.php?page=" . $page . "'>" . $page . "</a>";
                                echo "</li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Start Sidebar -->
                    <div class="col-md-4 sidebar">
                        <div class="widget sidebar-widget">
                            <div class="sidebar-widget-title">
                                <h3>Sermon Categories</h3>
                            </div>
                            <ul>
                                <li><a href="#">Faith</a> (10)</li>
                                <li><a href="#">Missions</a> (12)</li>
                                <li><a href="#">Salvation</a> (34)</li>
                                <li><a href="#">Worship</a> (14)</li>
                            </ul>
                        </div>
                        <div class="widget sidebar-widget">
                            <div class="sidebar-widget-title">
                                <h3>Sermon Speakers</h3>
                            </div>
                            <ul>
                                <li><a href="#">John Doe</a> (5)</li>
                                <li><a href="#">Mandra Patrick</a> (13)</li>
                                <li><a href="#">Sophie Chandol</a> (34)</li>
                                <li><a href="#">John Doe</a> (2)</li>
                            </ul>
                        </div>
                        <div class="widget sidebar-widget">
                            <div class="sidebar-widget-title">
                                <h3>Sermon Tags</h3>
                            </div>
                            <div class="tag-cloud">
                                <a href="#">Faith</a>
                                <a href="#">Heart</a>
                                <a href="#">Love</a>
                                <a href="#">Praise</a>
                                <a href="#">Sin</a>
                                <a href="#">Soul</a>
                                <a href="#">Missions</a>
                                <a href="#">Worship</a>
                                <a href="#">Faith</a>
                                <a href="#">Heart</a>
                                <a href="#">Love</a>
                                <a href="#">Praise</a>
                                <a href="#">Sin</a>
                                <a href="#">Soul</a>
                                <a href="#">Missions</a>
                                <a href="#">Worship</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer -->
    <?php include "footer.php"; ?>
    <!-- End Footer -->
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>
<?php include "script.php"; ?>
</body>
</html>
