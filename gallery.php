<!DOCTYPE HTML>
<html class="no-js">
<?php include "head.php"; ?>

<body>

<div class="body">
    <!-- Start Site Header -->
    <?php include "header.php";?>
    <!-- End Site Header -->
    <!-- Start Nav Backed Header -->
    <div class="nav-backed-header parallax" style="background-image:url(images/banner-go.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Church Gallery</li>
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
                    <h1>East Kampala Church Gallery</h1>
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
                    <ul class="isotope-grid" data-sort-id="gallery">
                        <?php
                        // Include your config.php file for database connection
                        include 'config.php';

                        // Pagination setup
                        $itemsPerPage = 12;
                        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $offset = ($current_page - 1) * $itemsPerPage;

                        $sql = "SELECT * FROM image_gallery LIMIT $offset, $itemsPerPage";
                        $viewing_img = $conn->prepare($sql);
                        $viewing_img->execute();

                        while ($row = $viewing_img->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <li class="col-md-3 col-sm-3 grid-item post format-image">
                                <div class="grid-item-inner">
                                    <a href="admin/images-gallery/<?php echo $row['gallery_img']; ?>" data-rel="prettyPhoto" class="media-box">
                                        <img src="admin/images-gallery/<?php echo $row['gallery_img']; ?>" alt="admin/images-gallery/<?php echo $row['gallery_title']; ?>">
                                    </a>
                                </div>
                            </li>
                            <?php
                        }

                        // Count the total records
                        $total_records = $conn->query("SELECT COUNT(*) FROM image_gallery")->fetchColumn();
                        $total_pages = ceil($total_records / $itemsPerPage);
                        ?>
                    </ul>
                </div>
                <div class="text-align-center">
                    <ul class="pagination">
                        <?php
                        for ($page = 1; $page <= $total_pages; $page++) {
                            echo "<li" . ($page == $current_page ? ' class="active"' : '') . ">";
                            echo "<a href='gallery.php?page=" . $page . "'>" . $page . "</a>";
                            echo "</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer -->
    <?php include "footer.php"; ?>
    <!-- End Footer -->
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>
<?php include "script.php";?>
</body>
</html>
