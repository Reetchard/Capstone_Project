<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Registration - Gym Management System</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="admin-login.php"><img src="img/TT.png" alt="PeakPulse"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Gym Management System</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="trainer.html">Trainer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gym-profiling.html">Gym Profiling</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="member.html">Members</a>
            </li>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Other
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="reservation.html">Reservation</a>
            <a class="dropdown-item" href="conflict-management.html">Conflict Management</a>
            </div>
            <li class="nav-item">
                <a class="nav-link" href="billing.html">Billing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reports.html">Reports</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Member Registration Form -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Member Registration</h2>
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
                $dob = $_POST['dob'];
                $phone = $_POST['phone'];
                $coach = $_POST['coach'];

                // Insert data into the database
                $sql = "INSERT INTO membership (id, name, date, dob, phone, coach) VALUES ('$id', '$name', '$date', '$dob', '$phone', '$coach')";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>Member registered successfully</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                }

                // Close the database connection
                $conn->close();
            }
            ?>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="id">ID</label>
                        <input type="text" name="id" class="form-control" id="id" placeholder="Enter ID" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date">Date of Joining</label>
                    <input type="date" name="date" class="form-control" id="date" placeholder="Enter Date of Joining" required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" id="dob" placeholder="Enter Date of Birth" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                    <label for="coach">Coach</label>
                    <input type="text" name="coach" class="form-control" id="coach" placeholder="Enter Coach's Name">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
