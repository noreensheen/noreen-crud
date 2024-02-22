<?php


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
    <?php include('head.php'); ?>
</head>
<body>

    <div class="d-flex">
        <?php include('sidebar.php'); ?>
        <main>
            <h1 class="text-center my-3">UPDATE STUDENT INFORMATION</h1>
            <div class="row">
                <form method="POST">
                <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <input type="hidden" id="studentID" name="studentID" value="<?php echo $row['studentID'] ?>" class="form-control" required/>
                        </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" value="<?php echo $row['firstName'] ?>" class="form-control" required/>
                        </div>
                    </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="form-control" required value="<?php echo $row['lastName'] ?>" />
                        </div>
                    </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="DOB">Date of Birth</label>
                            <input type="date" id="DoB" class="form-control" name="DoB" value="<?php echo $row['DoB'] ?>" required/>
                        </div>
                    </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" required/>
                        </div>
                    </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" class="form-control" name="address" value="<?php echo $row['address'] ?>" required/>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="offset-sm-2 col-sm-3 d-grid">
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
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