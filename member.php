<?php
include "config.php"; // Include your database connection file

// Fetch members from the database
//$query = "SELECT * FROM members";
//$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members - Gym Management System</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link  rel = "stylesheet" href = "style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<!-- Navigation Bar -->
<nav class="navbar">
        <div class="navbar-container">
            <a class="navbar-brand" href="#"><img src="img/Dumb1.png" alt="Logo"></a>
            <ul class="navbar-menu">
                <li class="navbar-item">
                    <a class="navbar-link" href="Dashboard.html">Gym Management System</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="member.php">Gym Members</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="trainer.php">Trainer</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="membership.php">Membership</a>
                </li>
                <li class="navbar-item dropdown">
                    <a class="navbar-link" href="#">Other</a>
                    <div class="dropdown-content">
                        <a href="reservation.php">Reservation</a>
                        <a href="conflict-management.php">Conflict Management</a>
                    </div>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="#">Billing</a>
                </li>
                <li class="navbar-item">
                    <a class="navbar-link" href="#">Report</a>
                </li>
            </ul>
        </div>

<!-- Navigation Bar ends -->




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Gym Members</h4>
                </div>
                <div class="card-body">
                    <!-- Table start -->
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Membership Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['membership_type']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- Table end -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
