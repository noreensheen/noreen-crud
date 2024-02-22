<?php
include('.././conn.php');

if (isset($_GET['studentID'])) {
    $id = $_GET['studentID'];

    $sql = "DELETE FROM `student` WHERE `studentID` = '$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:index.php');
    } else {
        die(mysqli_error($con));
    }
}
?>