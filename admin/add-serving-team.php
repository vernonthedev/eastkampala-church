<?php
include'config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Admin, Add Divine team | EKC SDA Church</title>
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
                            <h4 class="mb-sm-0 font-size-18">Add Serving Team</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="./">Admin</a></li>
                                    <li class="breadcrumb-item active">Add Serving Team</li>
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
                                <h4 class="card-title">Add Divine Serving team</h4>
                            </div>
                            <div class="card-body p-4">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="" method="POST" enctype="multipart/form-data" >

                                            <div class="mb-3">
                                                <label for="callto" class="form-label">Call To Worship:</label>
                                                <input class="form-control" rows="8" type="text"  id="callto" name="callto" placeholder="Call to worship by"></input>
                                            </div>

                                            <div class="mb-3">
                                                <label for="invocation" class="form-label">Invocation:</label>
                                                <input class="form-control" rows="8" type="text"  id="invocation" name="invocation" placeholder="Invocation by"></input>
                                            </div>

                                            <div class="mb-3">
                                                <label for="welcome" class="form-label">Welcome Song:</label>
                                                <input class="form-control" rows="8" type="text"  id="welcome" name="welcome" placeholder="Welcome Song"></input>
                                            </div>

                                            <div class="mb-3">
                                                <label for="pastoral" class="form-label">Pastoral Prayer: </label>
                                                <input class="form-control" rows="8" type="text"  id="pastoral" name="pastoral" placeholder="Pastoral Prayer by"></input>
                                            </div>

                                            <div class="mb-3">
                                                <label for="worship" class="form-label">Worship In Giving:</label>
                                                <input class="form-control" rows="8" type="text"  id="worship" name="worship" placeholder="Worship in giving by"></input>
                                            </div>

                                            <div class="mb-3">
                                                <label for="offertory" class="form-label">Offertory Music:</label>
                                                <input class="form-control" rows="8" type="text"  id="offertory" name="offertory" placeholder="Offertory by"></input>
                                            </div>

                                            <div class="mb-3">
                                                <label for="mem" class="form-label">Scripture Reading:</label>
                                                <input class="form-control" rows="8" type="text"  id="mem" name="mem" placeholder="Memory Text by"></input>
                                            </div>

                                            <div class="mb-3">
                                                <label for="special" class="form-label">Special Song:</label>
                                                <input class="form-control" rows="8" type="text"  id="special" name="special" placeholder="Special Song"></input>
                                            </div>

                                            <div class="mb-3">
                                                <label for="sermon" class="form-label">Sermon:</label>
                                                <input class="form-control" rows="8" type="text"  id="sermon" name="sermon" placeholder="Sermon by"></input>
                                            </div>

                                            <div class="mb-3">
                                                <label for="closing" class="form-label">Closing:</label>
                                                <input class="form-control" rows="8" type="text"  id="closing" name="closing" placeholder="Closing Song"></input>
                                            </div>

                                            <div class="mt-4">
                                                <button type="submit" name="submit" class="btn btn-primary w-md"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                                    </svg> Upload Serving Team</button>
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

    $callto = $_POST['callto'];
    $invocation = $_POST['invocation'];
    $welcome = $_POST['welcome'];
    $pastoral = $_POST['pastoral'];
    $worship = $_POST['worship'];
    $offertory = $_POST['offertory'];
    $closing = $_POST['closing'];
    $special = $_POST['special'];
    $mem = $_POST['mem'];
    $sermon = $_POST['sermon'];


    $insert_event = "INSERT INTO serving_team(id, call_to_worship, invocation, welcome, pastoral, worship, collection_music, scripture, special_music, sermon, closing_song) VALUES(?, ?, ?, ?, ?, ?,?,?,?,?,?)";
    $run_query = $conn->prepare($insert_event);
    $run_query->execute(["",$callto,$invocation,$welcome,$pastoral,$worship,$offertory,$mem,$special,$sermon, $closing]);

    if ($run_query->rowCount() > 0){
        echo '<script>swal("Compelete", "Songs Uploaded Successfully", "success");</script>';
    }
    else{
        echo '<script>swal("Failed", "Songs Not Uploaded Successfully", "error");</script>';
    }


}


?>
