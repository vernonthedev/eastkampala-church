<?php
include'config.php';

$my_banner_id = $_GET["id"];
$view_banners = "SELECT * FROM banner_slider WHERE id=?";
$results = $conn->prepare($view_banners);
$results->execute([$my_banner_id]);
$rows = $results->fetchAll();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Edit Banner | EKC SDA Church</title>
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
                                    <h4 class="mb-sm-0 font-size-18">Edit Banner</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="./">Admin</a></li>
                                            <li class="breadcrumb-item active">Edit Banner</li>
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
                                        <h4 class="card-title">Edit Banners</h4>
                                    </div>
                                    <div class="card-body editable_banner p-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <?php

                                                foreach($rows as $row){
                                                $banner_id = $row->id;
                                                $banner_title = $row->banner_title;
                                                $banner_content = $row->banner_content;
                                                $banner_img = $row->banner_img;
                                            }
                                                ?>

                                                <form action="" method="POST" enctype="multipart/form-data" >
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Banner Title:</label>
                                                        <input class="form-control" type="text"  id="example-text-input" name="banner_title" placeholder="Banner Title" value="<?php echo $banner_title ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Banner Image:</label>
                                                        <img class="editable_img" id="output" src="banner/<?php echo $banner_img ?>">
                                                        <input class="form-control" type="file"  id="example-img-input" name="banner_img" placeholder="Banner Image" onchange="loadFile(event)">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Banner Message:</label>
                                                        <textarea class="form-control" rows="4" type="text"  id="example-msg-input" name="banner_msg" placeholder="Banner Message"><?php echo $banner_content ?></textarea>
                                                    </div>

                                                    <div class="mt-4">
                                                        <button type="submit" name="submit" class="btn btn-primary w-md">Edit Banner</button>
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

        $update_banner = "UPDATE `banner_slider` SET `banner_title`= ? ,`banner_content`=?,`banner_img`=? WHERE `id` = ?";
        $run_query = $conn->prepare($update_banner);
        $run_query->execute([$banner_title,$banner_msg,$banner_img,$banner_id]);


        if ($run_query){
            echo '<script>swal("Compelete", "Banner Edited Successfully", "success");</script>';
        }
        else{
            echo '<script>swal("Failed", "Banner Not Edited", "error");</script>';
        }
    }
    else{
        echo '<script>swal("Failure", "Banner Data Not Edited, "error");</script>';
    }

}
?>
