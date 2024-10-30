<?php
require "index.php";
$id=$_REQUEST["id"];
$sql="DELETE FROM user WHERE id=$id";
if (mysqli_query($con, $sql)) {
    $returnmessage = "User Deleted successfully";
    $encoded_variable = urlencode($returnmessage);
    header("Location: index.php?returnmessage=$encoded_variable");
}
?>