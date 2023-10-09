<?php
include'config.php';

$recieved = $_GET["id"];

$delete_banner = "DELETE FROM banner_slider WHERE id = ? ";
$result = $conn->prepare($delete_banner);
$result->execute([$recieved]);

if ($result) {
    echo '<script>swal("Compelete", "Banner Deleted Successfully", "success");</script>';
    echo '<script> window.location.href = "banner-list.php";</script>';
} else {
    echo '<script>swal("Failure", "Banner Not Deleted", "success");</script>';
}
?>
