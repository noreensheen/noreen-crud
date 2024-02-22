<?php
include('../conn.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE `id` = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        // Handle the case where no user is found
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['id'])) {
        $id = $_POST['id']; // Use POST data, not GET
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = $_POST['password'];

        $sql = "UPDATE `users` SET `username`=?, `email`=?, `password`=? WHERE `id`=?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $password, $id);
        $query = mysqli_stmt_execute($stmt);

        if ($query) {
            header("Location: .././student/index.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

?>
<style>
        .navbar-custom .nav-item:hover, 
        #accountNav {
            background-color: white;
           
        }
        .navbar-custom .nav-item:hover a,
        #accountNav a {
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
        <main class="offset-sm-2">
            <h1 class=" my-5 offset-sm-3">UPDATE ACCOUNT</h1>
            <div class="row">
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="<?php echo $row['username'] ?>" class="form-control" required/>
                        </div>
                    </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required value="<?php echo $row['email'] ?>" />
                        </div>
                    </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" name="password" required/>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="offset-sm-2 col-sm-3 d-grid">
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </div>
                        <div class="col-sm-3 d-grid">
                            <a href=".././student/index.php" class="btn btn-outline-primary" role="button">Cancel</a>
                        </div>
                    </div>
                </form>
                <a href="../logout.php" class="nav-link active text-right my-3 mx-3">logout</a>
            </div>
        </main>
    </div>
</body>
</html>