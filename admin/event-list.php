<?php
include'config.php';
$view_events = "SELECT * FROM event_list";
$run_query = $conn->prepare($view_events);
$run_query->execute();
$rows = $run_query->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Admin, Event List | EKC SDA Church</title>
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
                                    <h4 class="mb-sm-0 font-size-18">Event List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Event List</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card bg-soft-warning rounded">
                                    <div class="card-body">

                                        <div class="table-responsive">


                                            <table class='table table-borderless table-dark table-editable table-nowrap align-middle table-edits'>
                                                <thead>
                                                    <tr>
                                                        <th>Event ID</th>
                                                        <th>Event Title</th>
                                                        <th>Event Date</th>
                                                        <th>Event Place</th>
                                                        <th>Event Content</th>
                                                        <th>Event Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                            foreach($rows as $row){
                                                $e_id = $row->event_id;
                                                $e_title = $row->event_title;
                                                $e_date = $row->event_date;
                                                $e_place = $row->event_place;
                                                $e_content = $row->event_content;
                                                $e_img = $row->event_img;


                                                    echo "<tr data-id='1'>
                                                        <td data-field='banner_id' style='width: 80px'> ".$e_id.".</td>
                                                        <td data-field='banner_title' class='banner_title'>".$e_title."</td>

                                                        <td data-field='banner_title' class='banner_title'>".$e_date."</td>
                                                        <td data-field='banner_title' class='banner_title'>".$e_place."</td>
                                                        <td data-field='banner_content' class='banner_content'>
                                                            <p>".$e_content."</p>
                                                        </td>
                                                        <td data-field='banner_img' class='banner_img'>
                                                            <img src='events/".$e_img."'>
                                                        </td>
                                                        <td style='width: 100px'>
                                                            <a href='edit-event.php?id=$e_id' class='btn btn-outline-secondary btn-sm edit' title='Edit'>
                                                                <i class='fas fa-pencil-alt'></i>
                                                            </a>
                                                            <a href='delete-event.php?id=$e_id'  class='btn btn-outline-secondary btn-sm edit' title='Delete'>
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

