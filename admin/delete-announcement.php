
<?php
include'config.php';

$recieved_id = $_GET["id"];
$delete_event = "DELETE FROM announcements WHERE ann_id= ?";
$results = $conn->prepare($delete_event);
$results->execute([$recieved_id]);


if ($results) {
    echo '<script>swal("Complete", "Annoucement Deleted Successfully", "success");</script>';
    echo '<script> window.location.href = "all-announcements.php";</script>';
} else {
    echo '<script>swal("Failed", "Error Deleting Record", "error");</script>';
}
?>
