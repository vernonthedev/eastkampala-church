<?php
include'config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Add Team Member | EKC SDA Church</title>
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
                                    <h4 class="mb-sm-0 font-size-18">Add Team Member</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="./">Admin</a></li>
                                            <li class="breadcrumb-item active">Add Team Member</li>
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
                                        <h4 class="card-title">Add Team Member</h4>
                                    </div>
                                    <div class="card-body p-4">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form action="" method="POST" enctype="multipart/form-data" >
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Member Name:</label>
                                                        <input class="form-control" type="text"  id="example-text-input" name="member_name" placeholder="Member Name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Member Title:</label>
                                                        <input class="form-control" type="text"  id="example-text-input" name="member_title" placeholder="Member Title">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Member Image:</label>
                                                        <input class="form-control" type="file"  id="example-img-input" name="member_img" placeholder="Member Image">
                                                    </div>

                                                    <div class="mt-4">
                                                        <button type="submit" name="add_member" class="btn btn-primary w-md"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
  <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
</svg> Upload Banner</button>
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
if (isset($_POST['add_member'])) {

$member_name = $_POST['member_name'];
$member_title = $_POST['member_title'];

$uploaddir = 'team-images';
    if(!is_dir($uploaddir)){
        mkdir($uploaddir);
    }

    $member_img = $_FILES['member_img']['name'];
    $tmp_member = $_FILES['member_img']['tmp_name'];
    $member_path = $uploaddir ."/". $member_img;

    if(move_uploaded_file($tmp_member, $member_path)){

        $insert_member = "INSERT INTO member_list(member_id, member_name, member_title, member_img) VALUES(?, ?, ?, ?)";
        $run_query = $conn->prepare($insert_member);
        $run_query->execute(['', $member_name, $member_title, $member_img]);

        if ($run_query){
            echo '<script>swal("Compelete", "Member Uploaded Successfully", "success");</script>';
        }
        else{
            echo '<script>swal("Failed", "Member Not Uploaded Successfully", "error");</script>';
        }
    }
    else{
        echo '<script>swal("Failure", "Member Not Uploaded", "error");</script>';
    }
}
?>
