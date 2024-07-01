<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Form</title>
</head>
<body>
    <h2>Reservation Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="resource">Select Resource:</label>
        <select id="resource" name="resource" required>
            <option value="">Select a resource</option>
            <?php
            // Example resources array (replace with actual data fetching from database)
            $resources = [
                ['id' => 1, 'name' => 'Resource 1'],
                ['id' => 2, 'name' => 'Resource 2'],
                ['id' => 3, 'name' => 'Resource 3']
            ];
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
        // Validate and sanitize inputs (adjust as per your validation requirements)
        $resource_id = isset($_POST['resource']) ? $_POST['resource'] : null;
        $start_time = isset($_POST['start_time']) ? $_POST['start_time'] : null;
        $end_time = isset($_POST['end_time']) ? $_POST['end_time'] : null;

        if ($resource_id && $start_time && $end_time) {
            // Validate time format (this is a basic check, adjust as per your requirements)
            if (!isValidDateTime($start_time) || !isValidDateTime($end_time)) {
                echo "<p>Invalid date/time format.</p>";
            } else {
                // Check availability
                if (isAvailable($resource_id, $start_time, $end_time)) {
                    // Insert reservation into database (example)
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
        } else {
            echo "<p>Please fill out all fields.</p>";
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
</body>
</html>
