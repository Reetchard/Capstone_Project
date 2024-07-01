<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; /* Bootstrap default background color */
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            font-weight: bold;
        }
        textarea {
            resize: vertical; /* Allow vertical resizing of textarea */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Report Form</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="reporter_name">Your Name:</label>
                <input type="text" class="form-control" id="reporter_name" name="reporter_name" required>
            </div>
            <div class="form-group">
                <label for="issue">Issue:</label>
                <textarea class="form-control" id="issue" name="issue" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

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
                echo '<div class="alert alert-success mt-3" role="alert">Report submitted successfully!</div>';
            } else {
                echo '<div class="alert alert-danger mt-3" role="alert">Failed to submit report.</div>';
            }
        }
        ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
