<?php
include'config.php';

$recieved = $_GET["id"];

$delete_gallery = "DELETE FROM image_gallery WHERE gallery_id= ? ";
$results = $conn->prepare($delete_gallery);
$results->execute([$recieved]);

if($results){
    echo '<script>alert("Gallery Image Deleted Successfully");</script>';
    echo '<script> window.location.href = "image-gallery.php";</script>';
} else {
    echo "Error deleting record: ";
}
?>
