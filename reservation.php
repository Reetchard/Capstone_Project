<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Registration - Gym Management System</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        /* Custom styles can be added here */
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="admin-login.php"><img src="img/.png" alt="PeakPulse"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Gym Management System</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="trainer.php">Trainer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="billing.php">Billing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gym-profiling.php">Gym Profiling</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="member.php">Member</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reports.php">Reports</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Receptionist Registration Form -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            Reservation  Registration Form
        </div>
        <div class="card-body">
            <form method="POST" action="receptionist.php" class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputID">ID</label>
                        <input type="text" name="id" class="form-control" id="inputID" placeholder="Enter ID" required>
                        <div class="invalid-feedback">
                            Please enter an ID.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputName">Name</label>
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter Name" required>
                        <div class="invalid-feedback">
                            Please enter a name.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDOB">Date of Birth</label>
                    <input type="text" name="date" class="form-control" id="inputDOB" placeholder="Enter Date of Birth" required>
                    <div class="invalid-feedback">
                        Please enter a valid date of birth.
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Enter Address" required>
                    <div class="invalid-feedback">
                        Please enter an address.
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPhone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="Enter Phone Number" required>
                    <div class="invalid-feedback">
                        Please enter a valid phone number.
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript and dependencies -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Client-side form validation -->
<script>
    // Bootstrap's built-in validation
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

</body>
</html>
