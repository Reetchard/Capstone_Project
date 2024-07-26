<?php
include "config.php"; // Include your database connection file

// Example resources array (replace with actual data fetching from database)
$resources = [
    ['id' => 1, 'name' => 'Resource 1'],
    ['id' => 2, 'name' => 'Resource 2'],
    ['id' => 3, 'name' => 'Resource 3']
];

// PHP code to handle form submission and conflict management
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Validate and sanitize inputs (adjust as per your validation requirements)
    $resource_id = isset($_POST['resource']) ? $_POST['resource'] : null;
    $start_time = isset($_POST['start_time']) ? $_POST['start_time'] : null;
    $end_time = isset($_POST['end_time']) ? $_POST['end_time'] : null;

    if ($resource_id && $start_time && $end_time) {
        // Validate time format (this is a basic check, adjust as per your requirements)
        if (!isValidDateTime($start_time) || !isValidDateTime($end_time)) {
            echo "<div class='alert alert-danger'>Invalid date/time format.</div>";
        } else {
            // Check availability
            if (isAvailable($resource_id, $start_time, $end_time)) {
                // Insert reservation into database (example)
                $user_id = 1; // Replace with actual user ID (from session or login)
                $insertQuery = "INSERT INTO reservations (resource_id, user_id, start_time, end_time)
                                VALUES ('$resource_id', '$user_id', '$start_time', '$end_time')";

                // Execute query (assuming you have a database connection)
                // $conn->query($insertQuery); // Uncomment and replace with your database connection

                echo "<div class='alert alert-success'>Reservation successful!</div>";
            } else {
                echo "<div class='alert alert-danger'>Sorry, the resource is not available at that time.</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'>Please fill out all fields.</div>";
    }
}

// Function to check if the resource is available for the given time range
function isAvailable($resource_id, $start_time, $end_time) {
    // Implement logic to check if the resource is available for the given time range
    // Example: Check if there are any overlapping reservations
    $conflictingReservations = []; // Replace with actual logic to fetch conflicting reservations

    return empty($conflictingReservations); // Return true if no conflicts found
}

// Function to validate date/time format (basic validation, adjust as needed)
function isValidDateTime($dateTime) {
    return preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/', $dateTime);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Form - Gym Management System</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel= "stylesheet" href = "style.css">
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
                        <a href="#">Reservation</a>
                        <a href="#">Conflict Management</a>
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
    </nav>
    <!-- End Navigation Bar -->

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h4>Reservation Form</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="form-group">
                        <label for="resource">Select Resource:</label>
                        <select id="resource" name="resource" class="form-control" required>
                            <option value="">Select a resource</option>
                            <?php foreach ($resources as $resource) { ?>
                                <option value="<?php echo $resource['id']; ?>"><?php echo $resource['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_time">Start Time:</label>
                        <input type="datetime-local" id="start_time" name="start_time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="end_time">End Time:</label>
                        <input type="datetime-local" id="end_time" name="end_time" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Reserve</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
