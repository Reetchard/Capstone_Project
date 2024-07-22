<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Registration - Gym Management System</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar">
    <div class="navbar-container">
        <a class="navbar-brand" href="#"><img src="img/Dumb1.png" alt="Logo"></a>
        <ul class="navbar-menu">
            <li class="navbar-item">
                <a class="navbar-link" href="accounts.php">Manage Account</a>
            </li>
            <li class="navbar-item">
                <a class="navbar-link" href="member.php">Manage Services/Promotions</a>
            </li>
            <li class="navbar-item">
                <a class="navbar-link" href="gym-profiling.php">Manage Gym Profile</a>
            </li>
            <li class="navbar-item">
                <a class="navbar-link" href="trainer.php">Manage Trainer Bookings</a>
            </li>
            <li class="navbar-item">
                <a class="navbar-link" href="gym-profiling.php">Manage Products</a>
            </li>
        </ul>
    </div>
</nav>
<!-- Navigation Bar Ends -->

<!-- Trainer Registration Form -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Trainer Management</h2>
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
                    <label for="experience">Experience</label>
                    <input type="text" name="experience" class="form-control" id="experience" placeholder="Enter Experience" required>
                </div>
                <div class="form-group">
                    <label for="worksAt">Works At</label>
                    <input type="text" name="worksAt" class="form-control" id="worksAt" placeholder="Enter Gym Name" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                <div id="formMessage" class="mt-3"></div>
                <button class="btn btn-secondary mb-3" onclick="openTrainerInfo()">Edit Trainer Information</button>
            </form>
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
            experience: experience,
            worksAt: worksAt
        }, function(error) {
            const formMessage = document.getElementById('formMessage');
            if (error) {
                formMessage.innerHTML = `<div class="alert alert-danger">Error: ${error.message}</div>`;
            } else {
                formMessage.innerHTML = `<div class="alert alert-success">Trainer information saved successfully!</div>`;
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
                        <td>${trainer.experience}</td>
                        <td>${trainer.worksAt}</td>
                    `;

                    trainerInfoBody.appendChild(row);
                }
            }
        });
    }

    // Function to open trainer information management page in a new tab
    function openTrainerInfo() {
        window.open('trainer-info.html', '_blank');
    }

    // Call the function to initially display trainer information
    displayTrainerInfo();
</script>

</body>
</html>
