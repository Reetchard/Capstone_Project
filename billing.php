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
    <a class="navbar-brand" href="admin-login.php"><img src="img/Dumb1.png" alt="Logo"></a>
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
                    <form id="billingForm">
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
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </form>
                    <div id="alert"></div>
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
                    <table class="table table-bordered" id="billingRecordsTable">
                        <thead>
                            <tr>
                                <th>Member ID</th>
                                <th>Member Name</th>
                                <th>Billing Date</th>
                                <th>Amount</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="billingRecordsBody">
                            <!-- Records will be populated here by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
                <form id="editBillingForm">
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
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Firebase JS SDK -->
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-database.js"></script>

<script>
    // Your web app's Firebase configuration
    const firebaseConfig = {
            apiKey: "AIzaSyAPNGokBic6CFHzuuENDHdJrMEn6rSE92c",
            authDomain: "capstone40-project.firebaseapp.com",
            databaseURL: "https://capstone40-project-default-rtdb.firebaseio.com",
            projectId: "capstone40-project",
            storageBucket: "capstone40-project.appspot.com",
            messagingSenderId: "399081968589",
            appId: "1:399081968589:web:5b502a4ebf245e817aaa84",
            measurementId: "G-CDP5BCS8EY"
        };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    // Reference your database
    const database = firebase.database();
    const billingRef = database.ref('billingForm');

    // Function to retrieve and display billing records
    function displayBillingRecords() {
        billingRef.on('value', function(snapshot) {
            const records = snapshot.val();
            const recordsBody = document.getElementById('billingRecordsBody');
            recordsBody.innerHTML = '';

            for (const key in records) {
                if (records.hasOwnProperty(key)) {
                    const record = records[key];
                    renderBillingRecord(key, record.id, record.name, record.date, record.amount);
                }
            }
        });
    }

    // Call the function to initially display billing records
    displayBillingRecords();

    // Function to render a billing record row
    function renderBillingRecord(key, id, name, date, amount) {
        const recordsBody = document.getElementById('billingRecordsBody');
        const row = document.createElement('tr');

        row.innerHTML = `
            <td>${id}</td>
            <td>${name}</td>
            <td>${date}</td>
            <td>${amount}</td>
            <td>
                <button class="btn btn-warning btn-sm btn-space" onclick="editRecord('${key}', '${id}', '${name}', '${date}', '${amount}')">Edit</button>
                <button class="btn btn-danger btn-sm" onclick="deleteRecord('${key}')">Delete</button>
            </td>
        `;
        recordsBody.appendChild(row);
    }

    // Function to save billing record
    function saveBillingRecord(id, name, date, amount) {
        const newBillingRef = billingRef.push();
        newBillingRef.set({
            id: id,
            name: name,
            date: date,
            amount: amount
        }, function(error) {
            if (error) {
                document.getElementById('alert').innerHTML = '<div class="alert alert-danger" role="alert">Error: ' + error.message + '</div>';
            } else {
                document.getElementById('alert').innerHTML = '<div class="alert alert-success" role="alert">Billing record saved successfully!</div>';
                document.getElementById('billingForm').reset();
                // After saving, render the new record in the table
                renderBillingRecord(newBillingRef.key, id, name, date, amount);
            }
        });
    }

    // Event listener for billing form submission
    document.getElementById('billingForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const id = document.getElementById('id').value;
        const name = document.getElementById('name').value;
        const date = document.getElementById('date').value;
        const amount = document.getElementById('amount').value;

        saveBillingRecord(id, name, date, amount);
    });

    // Function to edit billing record
            function editRecord(key, id, name, date, amount) {
            document.getElementById('edit-record-id').value = key;
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-date').value = date;
            document.getElementById('edit-amount').value = amount;

            $('#editModal').modal('show');
        }

        // Event listener for edit billing form submission
        document.getElementById('editBillingForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const key = document.getElementById('edit-record-id').value;
            const id = document.getElementById('edit-id').value;
            const name = document.getElementById('edit-name').value;
            const date = document.getElementById('edit-date').value;
            const amount = document.getElementById('edit-amount').value;

            const recordRef = billingRef.child(key);
            recordRef.update({
                id: id,
                name: name,
                date: date,
                amount: amount
            }, function(error) {
                if (error) {
                    alert('Error: ' + error.message);
                } else {
                    $('#editModal').modal('hide');
                    displayBillingRecords(); // Refresh the billing records
                }
            });
        });

    // Function to delete billing record
    function deleteRecord(key) {
    const recordRef = billingRef.child(key);
    recordRef.remove()
        .then(function() {
            alert('Record deleted successfully!');
            displayBillingRecords(); // Refresh the billing records
        })
        .catch(function(error) {
            alert('Error: ' + error.message);
        });
}

</script>


</body>
</html>
