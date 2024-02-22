<nav class="navbar-custom" id="customNavbar">
    <h1 class="text-center mb-2 text-white">CRUD SYSTEM</h1>
    <hr/>
    <ul class="nav flex-column position-relative">
        <li class="nav-item" id="studentNav">
            <a class="nav-link" aria-current="page" href=".././student/index.php">Student</a>
        </li>
        <li class="nav-item" id="accountNav">
            <?php
                include('.././conn.php');

                // Ensure $id is defined and is a valid integer
                if (isset($id) && is_numeric($id)) {
                    $sql = "SELECT * FROM `users` WHERE `id` = $id";
                    
                    $result = mysqli_query($con, $sql);

                    if (!$result) {
                        die("Query failed: " . mysqli_error($con));
                    }

                    $row = mysqli_fetch_assoc($result);

                    if ($row) {
                        echo "<a href='.././account/account.php?id=" . $row['id'] . "' class='nav-link'>Account</a>";
                    } else {
                        echo "No user found with ID: $id";
                    }
                } else {
                    echo "Invalid or missing ID.";
                }
            ?>
        </li>
    </ul>
</nav>
