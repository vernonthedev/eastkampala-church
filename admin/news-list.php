<?php
include'config.php';
$view_news = "SELECT * FROM news";
$run_query = $conn->prepare($view_news);
$run_query->execute();
$rows = $run_query->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Admin, News List | EKC SDA Church</title>
    <?php include'style.php'; ?>
</head>

<body>
        <!-- Begin page -->
        <div id="layout-wrapper">
    <?php include'header.php'; ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">News List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">News List</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card bg-soft-warning">
                                    <div class="card-body">

                                        <div class="table-responsive">


                                            <table class='table table-borderless table-dark  table-editable table-nowrap align-middle table-edits'>
                                                <thead>
                                                    <tr>
                                                        <th>News ID</th>
                                                        <th>News Title</th>
                                                        <th>News Date</th>
                                                        <th>News Place</th>
                                                        <th>News Content</th>
                                                        <th>News Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                            foreach($rows as $row){
                                                $n_id = $row->news_id;
                                                $n_title = $row->news_title;
                                                $n_date = $row->news_date;
                                                $n_place = $row->news_place;
                                                $n_content = $row->news_content;
                                                $n_img = $row->news_img;


                                                    echo "<tr data-id='1'>
                                                        <td data-field='banner_id' style='width: 80px'> ".$n_id.".</td>
                                                        <td data-field='banner_title' class='banner_title'>".$n_title."</td>

                                                        <td data-field='banner_title' class='banner_title'>".$n_date."</td>
                                                        <td data-field='banner_title' class='banner_title'>".$n_place."</td>
                                                        <td data-field='banner_content' class='banner_content'>
                                                            <p>".$n_content."</p>
                                                        </td>
                                                        <td data-field='banner_img' class='banner_img'>
                                                            <img src='news-images/".$n_img."'>
                                                        </td>
                                                        <td style='width: 100px'>
                                                            <a href='edit-news.php?id=$n_id' class='btn btn-outline-secondary btn-sm edit' title='Edit'>
                                                                <i class='fas fa-pencil-alt'></i>
                                                            </a>
                                                            <a href='delete-news.php?id=$n_id'  class='btn btn-outline-secondary btn-sm edit' title='Delete'>
                                                                <i class='fas fa-trash-alt'></i>
                                                            </a>
                                                        </td>
                                                    </tr>";
                                            }
                                             ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>

    <?php include'right-sidebar.php'; ?>

    <?php include'script.php'; ?>

</body>
</html>

