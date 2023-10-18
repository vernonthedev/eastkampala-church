<?php
include 'config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Add Upcoming Sabbath Sermon </title>
    <?php include'style.php'; ?>
</head>

<body>
<!-- Begin page -->
<div id="layout-wrapper">
    <?php include 'header.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Add Upcoming Sabbath Sermon</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="..">Admin</a></li>
                                    <li class="breadcrumb-item active">Add Upcomming Sabbath Sermon</li>
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
                                <h4 class="card-title">Add Upcoming Sabbath Sermon</h4>

                            </div>
                            <div class="card-body p-4">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="" method="POST" enctype="multipart/form-data" >


                                            <div class="mb-3">
                                                <label for="theme" class="form-label">Theme:</label>
                                                <textarea class="form-control" rows="4" type="text"  id="theme" name="theme" placeholder="Theme Message"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="title" class="form-label">Sermon title:</label>
                                                <textarea class="form-control" rows="4" type="text"  id="title" name="title" placeholder="Sermon title"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="preacher" class="form-label">Preacher:</label>
                                                <textarea class="form-control" rows="4" type="text"  id="preacher" name="preacher" placeholder="Sermon Preacher"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="special" class="form-label">Special Music:</label>
                                                <textarea class="form-control" rows="4" type="text"  id="special" name="special" placeholder="Special Music"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="mem class="form-label">Key Text:</label>
                                                <textarea class="form-control" rows="4" type="text"  id="mem" name="mem" placeholder="Key Text"></textarea>
                                            </div>

                                            <div class="mt-4">
                                                <button type="submit" name="submit" class="btn btn-primary w-md">Upload Next Sabbath Sermon</button>
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

        <?php include 'script.php'; ?>

</body>
</html>

<?php
if (isset($_POST['submit'])) {

    $theme = $_POST['theme'];
    $title = $_POST['title'];
    $preacher = $_POST['preacher'];
    $mem = $_POST['mem'];
    $special = $_POST['special'];


    $insert_announcement = "INSERT INTO upcoming(id, theme, sermon_title, preacher, key_text,music) VALUES(?, ?, ?,?,?,?)";
    $run_query = $conn->prepare($insert_announcement);
    $success = $run_query->execute(["",$theme, $title, $preacher, $mem, $special]);

    if ($success && $run_query->rowCount() > 0) {
        echo '<script>swal("Complete", "Next Sabbaths Sermon Uploaded Successfully", "success");</script>';
    } else {
        echo '<script>swal("Failed", "Next Sabbaths Not Uploaded Successfully", "error");</script>';
    }

}


?>
