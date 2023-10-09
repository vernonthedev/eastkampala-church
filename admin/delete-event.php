<?php
include'config.php';

$recieved_id = $_GET["id"];
$delete_event = "DELETE FROM event_list WHERE event_id= ?";
$results = $conn->prepare($delete_event);
$results->execute([$recieved_id]);


if ($results) {
    echo '<script>swal("Compelete", "Event Deleted Successfully", "success");</script>';
    echo '<script> window.location.href = "event-list.php";</script>';
} else {
    echo '<script>swal("Failed", "Error Deleting Record", "error");</script>';
}
?>
