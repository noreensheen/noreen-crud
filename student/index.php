<?php   
require_once('../config.php');

if (!isset($_SESSION['isLoggedIn'])) {
    header('location: ../login.php');
    }

$id = $_SESSION["id"];

 ?>

<!DOCTYPE html>
<html lang="en">
    <?php include('.././head.php'); ?>
    <style>
        .navbar-custom .nav-item:hover, 
        #studentNav {
            background-color: white;
           
        }
        .navbar-custom .nav-item:hover a,
        #studentNav a {
            color: #2c6545 !important;
        }
    </style>
<body>
    <div class="d-flex">
        <?php include('.././sidebar.php'); ?>
        <main>
            <div class="container my-5">
                <button id="showHide" class="m-2">SHOW HIDE</button>
            </div>
            <a href="create.php" role="button" class="btn btn-primary mx-5 my-2">New Student</a>
            <div class="card mx-5">
                <div class="card-header">
                    <div class="card-title">Student List</div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Student ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th> <!-- Fixed typo "address" to "Address" -->
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        include('.././conn.php');
                        $query = "SELECT * FROM `student`";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['studentID'] . "</td>";
                            echo "<td>" . $row['firstName'] . "</td>";
                            echo "<td>" . $row['lastName'] . "</td>";
                            echo "<td>" . $row['DoB'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>
                            <a href='update.php?studentID=$row[studentID]' class='btn btn-primary btn-sm'>UPDATE</a> 
                            <a href='delete_student.php?studentID=$row[studentID]' class='btn btn-danger btn-sm'>DELETE</a>
                            </td>";
                            echo "</tr>";
                        }
                        mysqli_close($con);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
