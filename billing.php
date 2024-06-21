<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing - Gym Management System</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        /* Optional: Add your custom styles here */
        body {
            padding: 20px;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="admin-login.php"><img src="img/TT.png" alt="Logo"></a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Gym Management System</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="trainer.php">Trainer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gym-profiling.php">Gym Profiling</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="membership.php">Membership</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reservation.php">Reservations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reports.php">Reports</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Billing Form -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Billing - Gym Management System</h2>
        </div>
        <div class="card-body">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="id">Member ID</label>
                        <input type="text" name="id" class="form-control" id="id" placeholder="Enter Member ID" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Member Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Member Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date">Billing Date</label>
                    <input type="date" name="date" class="form-control" id="date" placeholder="Select Billing Date" required>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter Amount" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
