<?php
include('conn.php');

if (isset($_GET['studentID'])) {
    $id = $_GET['studentID'];

    // JavaScript code to display a confirmation dialog
    echo '<script type="text/javascript">';
    echo 'if (confirm("Are you sure you want to delete this student?")) {';
    echo '   window.location.href = "delete.php?studentID=' . $id . '";';
    echo '}';
    echo 'else {';
    echo '   window.location.href = "student.php?studentID=' . $id . '";';
    echo '}';
    echo '</script>';
}
?>