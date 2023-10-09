<?php
include'config.php';

$my_inqs = $_GET["id"] ;
$view_inquiry = "SELECT * FROM contact_inquiry WHERE c_id =?";
$run_query = $conn->prepare($view_inquiry);
$run_query->execute([$my_inqs]);
$rows = $run_query->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Edit Inquiry | EKC SDA Church</title>
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
                                    <h4 class="mb-sm-0 font-size-18">Edit Inquiry</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="./">Admin</a></li>
                                            <li class="breadcrumb-item active">Edit Inquiry</li>
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
                                        <h4 class="card-title">Edit Inquiry</h4>
                                    </div>
                                    <div class="card-body editable_banner p-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <?php
                                                foreach($rows as $row){
                                                    $c_id = $row->c_id;
                                                    $c_name = $row->c_name;
                                                    $c_email = $row->c_email;
                                                    $c_phone = $row->c_phone;
                                                    $c_subject = $row->c_subject;
                                                    $c_massage = $row->c_massage;
                                                }
                                                ?>

                                                <form action="" method="POST">
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Contact Name:</label>
                                                        <input class="form-control" type="text"  id="example-text-input" name="c_name" placeholder="Contact Name" value="<?php echo $c_name ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Contact Email:</label>
                                                        <input class="form-control" type="text"  id="example-text-input" name="c_email" placeholder="Contact Email" value="<?php echo $c_email ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Contact Phone:</label>
                                                        <input class="form-control" type="text"  id="example-text-input" name="c_phone" placeholder="Contact Phone" value="<?php echo $c_phone ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Contact Subject:</label>
                                                        <input class="form-control" type="text"  id="example-text-input" name="c_subject" placeholder="Contact Subject" value="<?php echo $c_subject ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Contact Message:</label>
                                                        <textarea class="form-control" rows="4" type="text"  id="example-msg-input" name="c_massage" placeholder="Contact Message"><?php echo $c_massage ?></textarea>
                                                    </div>

                                                    <div class="mt-4">
                                                        <button type="submit" name="submit" class="btn btn-primary w-md">Edit Inquiry</button>

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

$c_name = $_POST['c_name'];
$c_email = $_POST['c_email'];
$c_phone = $_POST['c_phone'];
$c_subject = $_POST['c_subject'];
$c_massage = $_POST['c_massage'];

echo $c_id;

    $update_inquiry = "UPDATE contact_inquiry SET `c_name`=?,`c_email`=?,`c_phone`=?,`c_subject`=?,`c_massage`=? WHERE `c_id` = ?";
    $run_query = $conn->prepare($update_inquiry);
    $run_query->execute([$c_name,$c_email,$c_phone,$c_subject,$c_massage,$c_id]);

    if ($run_query){
        echo '<script>swal("Compelete", "Inquiry Updated Successfully", "success");</script>';
        echo '<script> window.location.href = "inquiry-list.php";</script>';
    }
    else{
        echo '<script>swal("Failed", "Inquiry Failed Updated", "error");</script>';
    }
}
?>
