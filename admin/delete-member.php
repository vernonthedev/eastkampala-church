<?php
include'config.php';

$my_id =  $_GET["id"];

$delete_member = "DELETE FROM member_list WHERE member_id=?";
$result = $conn->prepare($delete_member);
$result->execute([$my_id]);

if ($result) {
    echo '<script>alert("Member Deleted Successfully");</script>';
    echo '<script> window.location.href = "member-list.php";</script>';
} else {
    echo "Error deleting record: ";
}
?>
