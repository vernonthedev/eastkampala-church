<?php
include'config.php';
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Admin Dashboard | EKC SDA Church</title>
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
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100 bg-light">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Inquiries</span>
                                                <?php

                                                $query = "SELECT * FROM contact_inquiry";

                                                // Execute the query and store the result set
                                                $result = $conn->prepare($query);
                                                $result->execute();

                                                if ($result)
                                                {
                                                    // get the number of items or rows in the table
                                                $rowCount = $result->rowCount()
                                                ?>
                                                <h4 class="mb-3"><span class="counter-value" data-target="<?php echo $rowCount; ?>">0</span></h4>
                                                <?php
                                                }

                                                ?>
                                            </div>

                                        </div>
                                        <div class="text-nowrap">
                                            <span class="badge bg-soft-success text-success">+2.9k</span>
                                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100 bg-soft-danger">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Annoucements</span>
                                                <?php
                                                $query = "SELECT * FROM announcements";

                                                // Execute the query and store the result set
                                                $result = $conn->prepare($query);
                                                $result->execute();

                                                if ($result)
                                                {
                                                $rowCount = $result->rowCount();
                                                ?>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $rowCount; ?>">0</span>
                                                </h4>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="text-nowrap">
                                            <span class="badge bg-soft-danger text-danger">29 News</span>
                                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100 bg-soft-success">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Events</span>
                                                <?php
                                                $query = "SELECT * FROM event_list";

                                                // Execute the query and store the result set
                                                $result = $conn->prepare($query);
                                                $result->execute();


                                                if ($result)
                                                {
                                                $rowCount = $result->rowCount();

                                                ?>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $rowCount; ?>">0</span>
                                                </h4>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="text-nowrap">
                                            <span class="badge bg-soft-success text-success">+ 2.8</span>
                                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100 bg-soft-info">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Members</span>
                                                <?php
                                                $query = "SELECT * FROM member_list";

                                                // Execute the query and store the result set
                                                $result = $conn->prepare($query);
                                                $result->execute();

                                                if ($result)
                                                {
                                                $rowCount = $result->rowCount();
                                                ?>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="<?php echo $rowCount; ?>">0</span>
                                                </h4>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-6">
                                                <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                            </div>
                                        </div>
                                        <div class="text-nowrap">
                                            <span class="badge bg-soft-success text-success">+3</span>
                                            <span class="ms-1 text-muted font-size-13">Since last week</span>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row-->

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Contact Inquiry</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Contact Inquiry List</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="bg-soft-warning table table-bordered table-striped dt-responsive nowrap w-100">
                                            <thead class="bg-dark text-white">
                                            <tr>
                                                <th>Contact Id</th>
                                                <th>Contact Name</th>
                                                <th>Contact Email</th>
                                                <th>Contact Number</th>
                                                <th>Contact Subject</th>
                                                <th>Contact Message</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>

                                        <?php

                                        include'config.php';
                                        $view_inquiry = "SELECT * FROM contact_inquiry";
                                        $run_query = $conn->prepare($view_inquiry);
                                        $run_query->execute();
                                        $rows = $run_query->fetchAll();

                                        foreach($rows as $row){
                                                $c_id = $row->c_id;
                                                $c_name = $row->c_name;
                                                $c_email = $row->c_email;
                                                $c_phone = $row->c_phone;
                                                $c_subject = $row->c_subject;
                                                $c_massage = $row->c_massage;


                                                    echo "<tr data-id='1'>
                                                        <td data-field='contact_id' style='width: 80px'> ".$c_id.".
                                                        </td>
                                                        <td data-field='contact_title' class='contact_title'>".$c_name."
                                                        </td>
                                                        <td data-field='contact_content' class='contact_content'>
                                                            <p>".$c_email."</p>
                                                        </td>
                                                        <td data-field='contact_content' class='contact_content'>
                                                            <p>".$c_phone."</p>
                                                        </td>
                                                        <td data-field='contact_content' class='contact_content'>
                                                            <p>".$c_subject."</p>
                                                        </td>
                                                        <td data-field='contact_content' class='contact_content'>
                                                            <p>".$c_massage."</p>
                                                        </td>
                                                        <td style='width: 100px'>
                                                            <a href='edit-inquiry.php?id=$c_id' class='btn btn-outline-secondary btn-sm edit' title='Edit'>
                                                                <i class='fas fa-pencil-alt'></i>
                                                            </a>
                                                            <a href='delete-inquiry.php?id=$c_id'  class='btn btn-outline-secondary btn-sm edit' title='Delete'>
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
                                <!-- end cardaa -->
                            </div> <!-- end col -->
                        </div>
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

    <?php include'right-sidebar.php'; ?>

    <?php include'script.php'; ?>

</body>

</html>
