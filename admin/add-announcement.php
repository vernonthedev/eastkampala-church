<?php
include'config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Add Announcement | EKC SDA Churchs</title>
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
                            <h4 class="mb-sm-0 font-size-18">Add Announcement</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="./">Admin</a></li>
                                    <li class="breadcrumb-item active">Add Announcement</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Announcements</h4>

                            </div>
                            <div class="card-body p-4">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="" method="POST" enctype="multipart/form-data" >
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Announcement Title:</label>
                                                <input class="form-control" type="text"  id="example-text-input" name="ann_title" placeholder="Announcement Title">
                                            </div>


                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Message:</label>
                                                <textarea class="form-control" rows="4" type="text"  id="example-msg-input" name="ann_msg" placeholder="Announcement Message"></textarea>
                                            </div>

                                            <div class="mt-4">
                                                <button type="submit" name="submit" class="btn btn-primary w-md">Upload Announcement</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>

        <?php include'right-sidebar.php'; ?>

        <?php include'script.php'; ?>

</body>
</html>

<?php
if (isset($_POST['submit'])) {

    $banner_title = $_POST['ann_title'];
    $banner_msg = $_POST['ann_msg'];


        $insert_announcement = "INSERT INTO announcements(ann_id, ann_title, ann_content) VALUES(?, ?, ?)";
        $run_query = $conn->prepare($insert_announcement);
        $success = $run_query->execute(["",$banner_title, $banner_msg]);

        if ($success && $run_query->rowCount() > 0) {
            echo '<script>swal("Complete", "Announcement Uploaded Successfully", "success");</script>';
        } else {
            echo '<script>swal("Failed", "Announcement Not Uploaded Successfully", "error");</script>';
        }

}


?>
