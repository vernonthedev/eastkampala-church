<?php
include'config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Admin, Add Events | EKC SDA Church</title>
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
                            <h4 class="mb-sm-0 font-size-18">Add Event</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="./">Admin</a></li>
                                    <li class="breadcrumb-item active">Add Event</li>
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
                                <h4 class="card-title">Add Event</h4>
                            </div>
                            <div class="card-body p-4">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="" method="POST" enctype="multipart/form-data" >
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Event Title:</label>
                                                <input class="form-control" type="text"  id="example-text-input" name="e_title" placeholder="Event Title">
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Event Date:</label>
                                                <input class="form-control" type="date"  id="example-text-input" name="e_date" placeholder="Event Date">
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Event Place:</label>
                                                <input class="form-control" type="text"  id="example-text-input" name="e_place" placeholder="Event Place">
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Event Image:</label>
                                                <input class="form-control" type="file"  id="example-img-input" name="e_img" placeholder="Event Image">
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Event Content:</label>
                                                <textarea class="form-control" rows="8" type="text"  id="example-msg-input" name="e_content" placeholder="Event Content"></textarea>
                                            </div>

                                            <div class="mt-4">
                                                <button type="submit" name="submit" class="btn btn-primary w-md"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                                    </svg> Upload Event</button>
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

    $e_title = $_POST['e_title'];
    $e_date = $_POST['e_date'];
    $e_place = $_POST['e_place'];
    $e_img = $_POST['e_img'];
    $e_content = $_POST['e_content'];

    $uploaddir = 'events';
    if(!is_dir($uploaddir)){
        mkdir($uploaddir);
    }

    $e_img = $_FILES['e_img']['name'];
    $e_tmp = $_FILES['e_img']['tmp_name'];
    $e_path = $uploaddir ."/". $e_img;

    if(move_uploaded_file($e_tmp, $e_path)){

        $insert_event = "INSERT INTO event_list(event_id, event_title, event_date, event_place, event_content, event_img) VALUES(?, ?, ?, ?, ?, ?)";
        $run_query = $conn->prepare($insert_event);
        $run_query->execute(["",$e_title,$e_date,$e_place,$e_content,$e_img]);

        if ($run_query){
            echo '<script>swal("Compelete", "Program Uploaded Successfully", "success");</script>';
        }
        else{
            echo '<script>swal("Failed", "Program Not Uploaded Successfully", "error");</script>';
        }
    }
    else{
        echo '<script>swal("Failed", "Program Not Uploaded ", "error");</script>';
    }

}


?>
