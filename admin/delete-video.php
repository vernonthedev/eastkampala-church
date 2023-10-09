<?php
include'config.php';

$my_id =  $_GET["id"];

$delete_video = "DELETE FROM video_gallery WHERE video_id=?";
$result = $conn->prepare($delete_video);
$result->execute([$my_id]);

if ($result) {
    echo '<script>alert("Video Deleted Successfully");</script>';
    echo '<script> window.location.href = "video-list.php";</script>';
} else {
    echo "Error deleting record: ";
}
?>
