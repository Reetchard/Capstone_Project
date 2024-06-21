<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Form</title>
</head>
<body>
    <h2>Reservation Form</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="resource">Select Resource:</label>
        <select id="resource" name="resource" required>
            <option value="">Select a resource</option>
            <?php
            // Fetch resources from database
            $resources = []; // Fetch resources from database or define them here
            foreach ($resources as $resource) {
                echo "<option value=\"{$resource['id']}\">{$resource['name']}</option>";
            }
            ?>
        </select><br><br>

        <label for="start_time">Start Time:</label>
        <input type="datetime-local" id="start_time" name="start_time" required><br><br>

        <label for="end_time">End Time:</label>
        <input type="datetime-local" id="end_time" name="end_time" required><br><br>

        <input type="submit" name="submit" value="Reserve">
    </form>

    <?php
    // PHP code to handle form submission and conflict management
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $resource_id = $_POST['resource'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];

        // Validate and process reservation
        if (isAvailable($resource_id, $start_time, $end_time)) {
            // Insert reservation into database
            $user_id = 1; // Replace with actual user ID (from session or login)
            $insertQuery = "INSERT INTO reservations (resource_id, user_id, start_time, end_time)
                            VALUES ('$resource_id', '$user_id', '$start_time', '$end_time')";

            // Execute query (assuming you have a database connection)
            // $conn->query($insertQuery); // Uncomment and replace with your database connection

            echo "<p>Reservation successful!</p>";
        } else {
            echo "<p>Sorry, the resource is not available at that time.</p>";
        }
    }

    // Function to check availability
    function isAvailable($resource_id, $start_time, $end_time) {
        // Implement logic to check if the resource is available for the given time range
        // Query the database to see if there are any overlapping reservations

        // Example query (assuming MySQL datetime format)
        $checkQuery = "SELECT id FROM reservations
                       WHERE resource_id = '$resource_id'
                       AND ((start_time <= '$start_time' AND end_time > '$start_time')
                       OR (start_time < '$end_time' AND end_time >= '$end_time')
                       OR (start_time >= '$start_time' AND end_time <= '$end_time'))";

        // Execute query (assuming you have a database connection)
        // $result = $conn->query($checkQuery); // Uncomment and replace with your database connection

        // Example: Check if there are any conflicting reservations
        $conflictingReservations = []; // Replace with actual logic to fetch conflicting reservations

        return empty($conflictingReservations); // Return true if no conflicts found
    }
    ?>
</body>
</html>
