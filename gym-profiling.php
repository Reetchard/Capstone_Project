<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .nav-item {
            margin-right: 15px;
        }
        .gym-id {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 5px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#"><img src="img/Dumb1.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Gym Management System</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gym Members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trainer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Membership</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Other
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Reservation</a>
                        <a class="dropdown-item" href="#">Conflict Management</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Billing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Report</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navigation Bar ends -->

    <div class="container mt-5 pt-5">
        <div class="row">
            <!-- Form Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Gym Profiling Registration</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form start -->
                        <form id="gymForm" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputId">GYM ID</label>
                                    <input type="text" name="id" class="form-control" id="inputId" placeholder="ID">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputName">Gym Name</label>
                                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDate">Date of Establishment</label>
                                <input type="date" name="date" class="form-control" id="inputDate">
                            </div>
                            <div class="form-group">
                                <label for="inputExperience">Experience</label>
                                <input type="text" name="experience" class="form-control" id="inputExperience" placeholder="Experience">
                            </div>
                            <div class="form-group">
                                <label for="inputImage">Upload Photo</label>
                                <input type="file" name="image" class="form-control-file" id="inputImage">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
                        </form>
                        <!-- Form end -->
                    </div>
                </div>
            </div>

            <!-- Result Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-secondary text-white text-center">
                        <h4>Gym Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="#" class="img-fluid" alt="Gym Image" id="gymImage">
                        </div>
                        <h5 id="gymNameDisplay">Gym Name: </h5>
                        <p id="gymIdDisplay">Gym ID: </p>
                        <p id="gymDateDisplay">Date of Establishment: </p>
                        <p id="gymExperienceDisplay">Experience: </p>
                        <div id="gymProfiles"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Firebase SDK and Configuration -->
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-storage.js"></script>
    <script>
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
        
        var database = firebase.database();
        var storage = firebase.storage();
    </script>

</body>
</html>
