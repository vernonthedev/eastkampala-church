<?php
include'config.php';

$view_gallery = "SELECT * FROM image_gallery";
$run_query = $conn->prepare($view_gallery);
$run_query->execute();
$rows = $run_query->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Edit Gallery | EKC SDA Church</title>
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
                                    <h4 class="mb-sm-0 font-size-18">Edit Gallery</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="./">Admin</a></li>
                                            <li class="breadcrumb-item active">Edit Gallery</li>
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
                                        <h4 class="card-title">Edit Gallery</h4>
                                    </div>
                                    <div class="card-body editable_banner p-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <?php
                                                foreach($rows as $row){
                                                $gallery_id = $row->gallery_id;
                                                $gallery_title = $row->gallery_title;
                                                $gallery_img = $row->gallery_img;
                                            }
                                                ?>

                                                <form action="" method="POST" enctype="multipart/form-data" >
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Gallery Title:</label>
                                                        <input class="form-control" type="text"  id="example-text-input" name="gallery_title" placeholder="Gallery Title" value="<?php echo $gallery_title ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Gallery Image:</label>
                                                        <img class="editable_img" id="output" src="banner/<?php echo $gallery_img ?>">
                                                        <input class="form-control" type="file"  id="example-img-input" name="gallery_img" placeholder="Gallery Image" onchange="loadFile(event)">
                                                    </div>

                                                    <div class="mt-4">
                                                        <button type="submit" name="edit_gallery" class="btn btn-primary w-md">Edit Gallery</button>
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
if (isset($_POST['edit_gallery'])) {

$gallery_title = $_POST['gallery_title'];

$uploaddir = 'images-gallery';
    if(!is_dir($uploaddir)){
        mkdir($uploaddir);
    }

    $gallery_img = $_FILES['gallery_img']['name'];
    $tmp_gallery = $_FILES['gallery_img']['tmp_name'];
    $gallery_path = $uploaddir ."/". $gallery_img;

    if(move_uploaded_file($tmp_gallery, $gallery_path)){

        $update_gallery = "UPDATE `image_gallery` SET `gallery_title`=?,`gallery_img`=? WHERE `gallery_id` = ?";
        $run_query = $conn->prepare($update_gallery);
        $run_query->execute([$gallery_title,$gallery_img,$gallery_id]);

        if ($run_query){
            echo '<script>swal("Compelete", "Gallery Image Updated Successfully", "success");</script>';
        }
        else{
            echo '<script>swal("Failed", "Gallery Image Not Updated", "error");</script>';
        }
    }
    else{
        echo '<script>swal("Failure", "Gallery Image Not Edited", "error");</script>';
    }

}
?>
