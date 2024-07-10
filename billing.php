<?php
include 'config.php';

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
            background: url(../Capstone/img/BG.png);
            background-size: cover;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: box-shadow 0.5s ease;
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
        .btn-space {
            margin-right: 0.5rem;
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
                <a class="nav-link" href="member.php">Member</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="membership.php">Membership</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Other
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="reservation.php">Reservation</a>
                    <a class="dropdown-item" href="conflict-management.php">Conflict Management</a>
                </div>
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
                        echo "<th>Actions</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['member_id'] . "</td>";
                            echo "<td>" . $row['member_name'] . "</td>";
                            echo "<td>" . $row['billing_date'] . "</td>";
                            echo "<td>" . $row['amount'] . "</td>";
                            echo "<td>";
                            echo "<button class='btn btn-sm btn-warning edit-btn btn-space' data-id='" . $row['id'] . "' data-member_id='" . $row['member_id'] . "' data-member_name='" . $row['member_name'] . "' data-billing_date='" . $row['billing_date'] . "' data-amount='" . $row['amount'] . "'>Edit</button>";
                            echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "' style='display:inline-block;'>";
                            echo "<input type='hidden' name='record_id' value='" . $row['id'] . "'>";
                            echo "<button type='submit' name='delete' class='btn btn-sm btn-danger btn-space'>Delete</button>";
                            echo "</form>";
                            echo "</td>";
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
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Billing Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="record_id" id="edit-record-id">
                    <div class="form-group">
                        <label for="edit-id">Member ID</label>
                        <input type="text" name="id" class="form-control" id="edit-id" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-name">Member Name</label>
                        <input type="text" name="name" class="form-control" id="edit-name" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit-date">Billing Date</label>
                            <input type="date" name="date" class="form-control" id="edit-date" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit-amount">Amount</label>
                            <input type="text" name="amount" class="form-control" id="edit-amount" required>
                        </div>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7H UibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = button.getAttribute('data-id');
            const memberId = button.getAttribute('data-member_id');
            const memberName = button.getAttribute('data-member_name');
            const billingDate = button.getAttribute('data-billing_date');
            const amount = button.getAttribute('data-amount');

            document.getElementById('edit-record-id').value = id;
            document.getElementById('edit-id').value = memberId;
            document.getElementById('edit-name').value = memberName;
            document.getElementById('edit-date').value = billingDate;
            document.getElementById('edit-amount').value = amount;

            $('#editModal').modal('show');
        });
    });
});
</script>

</body>
</html>
