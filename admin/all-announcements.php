<?php
include'config.php';
$view_inquiry = "SELECT * FROM announcements";
$run_query = $conn->prepare($view_inquiry);
$run_query->execute();
$rows = $run_query->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Annoucements List | EKC SDA Church</title>
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
                            <h4 class="mb-sm-0 font-size-18">Annoucements List</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Annoucements</li>
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
                                            <th>Annoucement ID</th>
                                            <th>Annoucement Title</th>
                                            <th>Annoucement Content</th>
                                            <th>Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($rows as $row){
                                            $ann_id = $row->ann_id;
                                            $ann_title = $row->ann_title;
                                            $ann_content = $row->ann_content;

                                            echo "<tr data-id='1'>
                                                        <td data-field='contact_id' style='width: 80px'> ".$ann_id.".
                                                        </td>
                                                        <td data-field='contact_title' class='contact_title'>".$ann_title."
                                                        </td>
                                                        <td data-field='contact_content' class='contact_content'>
                                                            <p>".$ann_content."</p>
                                                        </td>
                                                        <td style='width: 100px'>
                                                            <a href='edit-announcements.php?id=$ann_id' class='btn btn-outline-secondary btn-sm edit' title='Edit'>
                                                                <i class='fas fa-pencil-alt'></i>
                                                            </a>
                                                            <a href='delete-announcement.php?id=$ann_id'  class='btn btn-outline-secondary btn-sm edit' title='Delete'>
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


