<?php
include'config.php';
$recieved_id = $_GET["id"];

$delete_data = "DELETE FROM contact_inquiry WHERE c_id=?";
$results = $conn->prepare($delete_data);
$results->execute([$recieved_id]);
if($results){
    echo '<script>swal("Compelete", "Inquiry Deleted Successfully", "success");</script>';
    echo '<script> window.location.href = "inquiry-list.php";</script>';
}
else {
    echo "Error deleting record: ";
}

include 'script.php';
?>
