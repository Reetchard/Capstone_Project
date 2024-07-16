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
            background: url(../Capstone/img/BG.png);
            padding: 20px;
            background-size: cover;
        }
        .container {
            max-width: 600px;
            background-color: #ffff;
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
    <!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-light fixed-top">
    <a class="navbar-brand" href="admin-login.php"><img src="#" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="Dashboard.html">Gym Management System</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gym-profiling.php">Gym Profiling</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="trainer.php">Trainer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="member.php">Members</a>
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
                <a class="nav-link" href="billing.php">Billing</a>
            </li>
        </ul>
    </div>
</nav>
    <div class="container">
        <h2>Report Form</h2>
        <form id="ReportForm">
            <div class="form-group">
                <label for="reporter_name">Your Name:</label>
                <input type="text" class="form-control" id="name" name="reporter_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="issue">Issue:</label>
                <textarea class="form-control" id="issue" name="issue" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="alert"></div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-database.js"></script>
    <script>
        // Firebase configuration
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
        var ReportFormDB = firebase.database().ref('ReportForm');

        document.getElementById('ReportForm').addEventListener('submit', submitForm);

        function submitForm(e) {
            e.preventDefault();

            var name = getElementVal('name');
            var email = getElementVal('email');
            var issue = getElementVal('issue');

            console.log(name, email, issue);

            saveMessages(name, email, issue);

            // Show alert
            document.getElementById('alert').innerHTML = '<div class="alert alert-success mt-3" role="alert">Report submitted successfully!</div>';

            // Reset form
            document.getElementById('ReportForm').reset();
        }

        const getElementVal = (id) => {
            return document.getElementById(id).value;
        }

        const saveMessages = (name, email, issue) => {
            var newReportForm = ReportFormDB.push();

            newReportForm.set({
                name: name,
                email: email,
                issue: issue
            });
        }
    </script>
</body>
</html>
