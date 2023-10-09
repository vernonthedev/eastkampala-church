<?php
include'config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Admin, Add Devotion | EKC SDA Church</title>
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
                                    <h4 class="mb-sm-0 font-size-18">Add Devotion</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="./">Admin</a></li>
                                            <li class="breadcrumb-item active">Add Devotion</li>
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
                                        <h4 class="card-title">Add Devotion</h4>
                                    </div>
                                    <div class="card-body p-4">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form action="" method="POST" enctype="multipart/form-data" >
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Devotion Title:</label>
                                                        <input class="form-control" type="text"  id="example-text-input" name="n_title" placeholder="Devotion Title">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Devotion Date:</label>
                                                        <input class="form-control" type="date"  id="example-text-input" name="n_date" placeholder="Devotion Date">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Devotion Place:</label>
                                                        <input class="form-control" type="text"  id="example-text-input" name="n_place" placeholder="Devotion Place">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Devotion Type:</label>
                                                        <input class="form-control" type="text"  id="example-text-input" name="n_type" placeholder="Devotion Types are 'popular' and 'latest'">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Devotion Image:</label>
                                                        <input class="form-control" type="file"  id="example-img-input" name="n_img" placeholder="Devotion Image">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Devotion Content:</label>
                                                        <textarea class="form-control" rows="8" type="text"  id="example-msg-input" name="n_content" placeholder="Devotion Content"></textarea>
                                                    </div>

                                                    <div class="mt-4">
                                                        <button type="submit" name="submit" class="btn btn-primary w-md"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
  <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
</svg> Upload Devotion</button>
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

$n_title = $_POST['n_title'];
$n_date = $_POST['n_date'];
$n_place = $_POST['n_place'];
$n_type = $_POST['n_type'];
$n_img = $_POST['n_img'];
$n_content = $_POST['n_content'];

$uploaddir = 'news-images';
    if(!is_dir($uploaddir)){
        mkdir($uploaddir);
    }

    $n_img = $_FILES['n_img']['name'];
    $n_tmp = $_FILES['n_img']['tmp_name'];
    $n_path = $uploaddir ."/". $n_img;

    if(move_uploaded_file($n_tmp, $n_path)){

        $insert_news = "INSERT INTO news(news_id, news_title, news_date, news_place, news_type, news_content, news_img) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $run_query = $conn->prepare($insert_news);
        $run_query->execute(['',$n_title, $n_date, $n_place, $n_type, $n_content, $n_img]);

        if ($run_query){
            echo '<script>swal("Compelete", "Devotion Uploaded Successfully", "success");</script>';
            echo '<script> window.location.href = "news-list.php";</script>';
        }
        else{
            echo '<script>swal("Failed", "Devotion Not Uploaded Successfully", "error");</script>';
        }
    }
    else{
        echo '<script>swal("Failure", "Devotion Not Uploaded", "error");</script>';
    }

}


?>
