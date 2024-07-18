<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Registration - Gym Management System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="admin-login.php"><img src="img/Dumb1.png" alt="Logo"></a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Gym Management System</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gym-profiling.php">Gym Profiling</a>
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
            <li class="nav-item">
                <a class="nav-link" href="reports.php">Reports</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Trainer Registration Form -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Trainer Registration</h2>
        </div>
        <div class="card-body">
            <form id="trainerForm">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="id">ID</label>
                        <input type="text" name="id" class="form-control" id="id" placeholder="Enter ID" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Trainer Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date">Date of Birth</label>
                    <input type="date" name="date" class="form-control" id="date" placeholder="Enter Date of Birth" required>
                </div>
                <div class="form-group">
                    <label for="experience">Experience</label>
                    <input type="text" name="experience" class="form-control" id="experience" placeholder="Enter Experience" required>
                </div>
                <div class="form-group">
                    <label for="worksAt">Works At</label>
                    <input type="text" name="worksAt" class="form-control" id="worksAt" placeholder="Enter Gym Name" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<!-- Trainer Information Display -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Trainer Information</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="trainerInfoTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Experience</th>
                        <th>Works At</th>
                    </tr>
                </thead>
                <tbody id="trainerInfoBody">
                    <!-- Trainer information will be populated here by JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>

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
    if (!firebase.apps.length) {
        firebase.initializeApp(firebaseConfig);
    } else {
        firebase.app();
    }

    const database = firebase.database();
    const trainerRef = database.ref('trainers');

    // Function to save trainer information
    function saveTrainer(id, name, date, experience, worksAt) {
        const newTrainerRef = trainerRef.push();
        newTrainerRef.set({
            id: id,
            name: name,
            date: date,
            experience: experience,
            worksAt: worksAt
        }, function(error) {
            if (error) {
                alert('Error: ' + error.message);
            } else {
                alert('Trainer information saved successfully!');
                document.getElementById('trainerForm').reset();
                displayTrainerInfo();
            }
        });
    }

    // Event listener for trainer form submission
    document.getElementById('trainerForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const id = document.getElementById('id').value;
        const name = document.getElementById('name').value;
        const date = document.getElementById('date').value;
        const experience = document.getElementById('experience').value;
        const worksAt = document.getElementById('worksAt').value;

        saveTrainer(id, name, date, experience, worksAt);
    });

    // Function to retrieve and display trainer information
    function displayTrainerInfo() {
        trainerRef.on('value', function(snapshot) {
            const trainers = snapshot.val();
            const trainerInfoBody = document.getElementById('trainerInfoBody');
            trainerInfoBody.innerHTML = '';

            for (const key in trainers) {
                if (trainers.hasOwnProperty(key)) {
                    const trainer = trainers[key];
                    const row = document.createElement('tr');

                    row.innerHTML = `
                        <td>${trainer.id}</td>
                        <td>${trainer.name}</td>
                        <td>${trainer.date}</td>
                        <td>${trainer.experience}</td>
                        <td>${trainer.worksAt}</td>
                    `;

                    trainerInfoBody.appendChild(row);
                }
            }
        });
    }

    // Call the function to initially display trainer information
    displayTrainerInfo();
</script>

</body>
</html>
