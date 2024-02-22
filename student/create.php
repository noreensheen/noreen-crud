<?php
include('.././conn.php');

if (!isset($_SESSION['isLoggedIn'])) {
    header('location: ../login.php');
    }


$id = $_SESSION["id"];

if (isset($_POST['submit'])) {
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $dob = $_POST['DOB'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "INSERT INTO `student` (`firstName`, `lastName`, `DOB`, `email`, `address`) VALUES ('$fname', '$lname', '$dob', '$email', '$address')";
    $result = mysqli_query($con, $sql);

    if($result) {
        header("Location: index.php?msg= New record added successfully!");
    }
    else {
        echo "Failed: " . mysqli_error($con);
    }
}

?>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('.././head.php'); ?>
</head>
<body>
    <div class="d-flex">
        <?php include('.././sidebar.php'); ?>
        <main>
            <div class="container">
                <h1 class="text-center my-3">ADD NEW STUDENT</h1>
            </div> 
            <div class="row">
                <form method="POST">
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" class="form-control" required/>
                        </div>
                    </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="form-control" required/>
                        </div>
                    </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="DOB">Date of Birth</label>
                            <input type="date" id="DOB" class="form-control" name="DOB" required/>
                        </div>
                    </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" required/>
                        </div>
                    </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" class="form-control" name="address" required/>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="offset-sm-2 col-sm-3 d-grid">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-sm-3 d-grid">
                            <a href="index.php" class="btn btn-outline-primary" role="button">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
    
</body>
</html>