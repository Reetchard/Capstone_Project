<?php
$servername = "localhost";
$username = "root";  // default XAMPP username
$password = "";      // default XAMPP password is empty
$dbname = "Gym";     // ensure this database exists

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $amount = $_POST['amount'];

        $sql = "INSERT INTO billing (member_id, member_name, billing_date, amount) VALUES ('$id', '$name', '$date', '$amount')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Record added successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $amount = $_POST['amount'];
        $record_id = $_POST['record_id'];

        $sql = "UPDATE billing SET member_id='$id', member_name='$name', billing_date='$date', amount='$amount' WHERE id='$record_id'";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Record updated successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    } elseif (isset($_POST['delete'])) {
        $record_id = $_POST['record_id'];

        $sql = "DELETE FROM billing WHERE id='$record_id'";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Record deleted successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }
}
?>
