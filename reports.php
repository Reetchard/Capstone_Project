
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Form</title>
</head>
<body>
    <h2>Report Form</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="reporter_name">Your Name:</label><br>
        <input type="text" id="reporter_name" name="reporter_name" required><br><br>

        <label for="issue">Issue:</label><br>
        <textarea id="issue" name="issue" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $reporter_name = $_POST['reporter_name'];
    $issue = $_POST['issue'];

    // Example: save to a file (you might want to store in a database in a real application)
    $filename = 'reports.txt';
    $data = "Reporter Name: $reporter_name\nIssue:\n$issue\n\n";

    // Append to file
    if (file_put_contents($filename, $data, FILE_APPEND | LOCK_EX) !== false) {
        echo '<p>Report submitted successfully!</p>';
    } else {
        echo '<p>Failed to submit report.</p>';
    }
}
?>
