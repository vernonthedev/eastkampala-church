<?php
include'config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Admin, Add Songs | EKC SDA Church</title>
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
                            <h4 class="mb-sm-0 font-size-18">Add Hymns</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="./">Admin</a></li>
                                    <li class="breadcrumb-item active">Add Hymns</li>
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
                                <h4 class="card-title">Add Hymns</h4>
                            </div>
                            <div class="card-body p-4">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="" method="POST" enctype="multipart/form-data" >

                                            <div class="mb-3">
                                                <label for="introit" class="form-label">Introit:</label>
                                                <textarea class="form-control" rows="8" type="text"  id="introit" name="introit" placeholder="Introit Content"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="callto" class="form-label">Call to Worship:</label>
                                                <textarea class="form-control" rows="8" type="text"  id="callto" name="callto" placeholder="Call to Worship Content"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="dox" class="form-label">Doxology:</label>
                                                <textarea class="form-control" rows="8" type="text"  id="dox" name="dox" placeholder="Doxology"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="welcome" class="form-label">Welcome Song: </label>
                                                <textarea class="form-control" rows="8" type="text"  id="welcome" name="welcome" placeholder="Welcoming song"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="opening" class="form-label">Opening Hymn:</label>
                                                <textarea class="form-control" rows="8" type="text"  id="opening" name="opening" placeholder="Opening Song"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="prayerSong" class="form-label">Prayer Song:</label>
                                                <textarea class="form-control" rows="8" type="text"  id="prayerSong" name="prayerSong" placeholder="Prayer Song"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="mem" class="form-label">Memory Text:</label>
                                                <textarea class="form-control" rows="8" type="text"  id="mem" name="mem" placeholder="Memory Text"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="closing" class="form-label">Closing Hymn:</label>
                                                <textarea class="form-control" rows="8" type="text"  id="closing" name="closing" placeholder="Closing Song"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="affirm" class="form-label">Affirmation Hymn:</label>
                                                <textarea class="form-control" rows="8" type="text"  id="affirm" name="affirm" placeholder="Affirmation Song"></textarea>
                                            </div>

                                            <div class="mt-4">
                                                <button type="submit" name="submit" class="btn btn-primary w-md"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                                    </svg> Upload Divine Songs</button>
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

    $introit = $_POST['introit'];
    $callto = $_POST['callto'];
    $doxology = $_POST['dox'];
    $welcome = $_POST['welcome'];
    $opening = $_POST['opening'];
    $prayer = $_POST['prayerSong'];
    $mem = $_POST['mem'];
    $closing = $_POST['closing'];
    $affirm = $_POST['affirm'];


        $insert_event = "INSERT INTO songs(id, introit, call_to_worship, doxology, welcome, opening, prayer_song, memory_text, closing, affirmation) VALUES(?, ?, ?, ?, ?, ?,?,?,?,?)";
        $run_query = $conn->prepare($insert_event);
        $run_query->execute(["",$introit,$callto,$doxology,$welcome,$opening,$prayer,$mem,$closing,$affirm]);

        if ($run_query->rowCount() > 0){
            echo '<script>swal("Compelete", "Songs Uploaded Successfully", "success");</script>';
        }
        else{
            echo '<script>swal("Failed", "Songs Not Uploaded Successfully", "error");</script>';
        }


}


?>
