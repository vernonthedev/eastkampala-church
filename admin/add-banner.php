<?php
include'config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Add Banner | EKC SDA Churchs</title>
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
                                    <h4 class="mb-sm-0 font-size-18">Add Banner</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="./">Admin</a></li>
                                            <li class="breadcrumb-item active">Add Banner</li>
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
                                        <h4 class="card-title">Add Banners</h4>
                                        <p class="card-title-desc bg-danger text-white rounded">Please Note that when your uploading a banner image, the height of the image should be exactly 500px and any height of your choice."</p>
                                    </div>
                                    <div class="card-body p-4">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form action="" method="POST" enctype="multipart/form-data" >
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Banner Title:</label>
                                                        <input class="form-control" type="text"  id="example-text-input" name="banner_title" placeholder="Banner Title">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Banner Image:</label>
                                                        <input class="form-control" type="file"  id="example-img-input" name="banner_img" placeholder="Banner Image">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Banner Message:</label>
                                                        <textarea class="form-control" rows="4" type="text"  id="example-msg-input" name="banner_msg" placeholder="Banner Message"></textarea>
                                                    </div>

                                                    <div class="mt-4">
                                                        <button type="submit" name="submit" class="btn btn-primary w-md">Upload Banner</button>
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

$banner_title = $_POST['banner_title'];
$banner_msg = $_POST['banner_msg'];

$uploaddir = 'banner';
    if(!is_dir($uploaddir)){
        mkdir($uploaddir);
    }

    $banner_img = $_FILES['banner_img']['name'];
    $tmp_banner = $_FILES['banner_img']['tmp_name'];
    $banner_path = $uploaddir ."/". $banner_img;

    if(move_uploaded_file($tmp_banner, $banner_path)){

        $insert_banner = "INSERT INTO banner_slider(id, banner_title, banner_content, banner_img) VALUES(?, ?, ?, ?)";
        $run_query = $conn->prepare($insert_banner);
        $run_query->execute(["",$banner_title, $banner_msg, $banner_img]);

        if ($run_query){
            echo '<script>swal("Compelete", "Banner Uploaded Successfully", "success");</script>';
        }
        else{
            echo '<script>swal("Failed", "Banner Not Uploaded Successfully", "error");</script>';
        }
    }
    else{
        echo '<script>swal("Failure", "Banner Not Uploaded", "success");</script>';
    }

}


?>
