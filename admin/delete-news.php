<?php
include'config.php';

$my_id =  $_GET["id"];

$delete_news = "DELETE FROM news WHERE news_id=?";
$result = $conn->prepare($delete_news);
$result->execute([$my_id]);

if ($result) {
    echo '<script>alert("Devotion Deleted Successfully");</script>';
    echo '<script> window.location.href = "news-list.php";</script>';
} else {
    echo "Error deleting record:";
}
?>
