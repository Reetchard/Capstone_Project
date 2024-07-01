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
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="admin-login.php"><img src="img/TT.png" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
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
                <a class="nav-link" href="conflict-management.php">Conflict Management</a>
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

<!-- Main Content -->
<div class="container mt-4">
    <div class="row">
        <!-- Billing Form -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Billing - Gym Management System</h2>
                </div>
                <div class="card-body">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Include the database configuration file
                        include 'config.php';

                        // Retrieve form data
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $date = $_POST['date'];
                        $amount = $_POST['amount'];

                        // Insert data into the database
                        $sql = "INSERT INTO billing (member_id, member_name, billing_date, amount) VALUES ('$id', '$name', '$date', '$amount')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<div class='alert alert-success'>Record added successfully</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                        }

                        // Close the database connection
                        $conn->close();
                    }
                    ?>

                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="id">Member ID</label>
                            <input type="text" name="id" class="form-control" id="id" placeholder="Enter Member ID" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Member Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Member Name" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="date">Billing Date</label>
                                <input type="date" name="date" class="form-control" id="date" placeholder="Select Billing Date" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amount">Amount</label>
                                <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter Amount" required>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Billing Records Table -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Billing Records</h2>
                </div>
                <div class="card-body">
                    <?php
                    // Include the database configuration file
                    include 'config.php';

                    // Retrieve billing records
                    $sql = "SELECT * FROM billing";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table class='table table-bordered'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Member ID</th>";
                        echo "<th>Member Name</th>";
                        echo "<th>Billing Date</th>";
                        echo "<th>Amount</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['member_id'] . "</td>";
                            echo "<td>" . $row['member_name'] . "</td>";
                            echo "<td>" . $row['billing_date'] . "</td>";
                            echo "<td>" . $row['amount'] . "</td>";
                            echo "</tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<div class='alert alert-warning'>No billing records found</div>";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7H UibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
