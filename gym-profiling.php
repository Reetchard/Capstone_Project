<?php
include "config.php";

if (isset($_REQUEST["submit"])) {
    $id = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $date = $_REQUEST["date"];
    $experience = $_REQUEST["experience"];
    $image = $_FILES['image']['name'];
    $target = "img/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $ins = "INSERT INTO coach (id,name,date,experience,image) VALUES ('$id','$name','$date','$experience','$target')";
        $query1 = mysqli_query($connection, $ins);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    <a class="navbar-brand" href="admin-login.php"><img src="img/TT.png" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="Dashboard.html">Gym Management System</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="member.php">Gym Members</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="trainer.php">Trainer</a>
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
                <a class="nav-link" href="reports.php">Report</a>
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
                            <label for="inputDate">Date of Birth</label>
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
                        
                        <img src="img/gym_placeholder.jpg" class="img-fluid" alt="Gym Image" id="gymImage">
                    </div>
                    <h5 id="gymNameDisplay">Gym Name: </h5>
                    <p id="gymIdDisplay">Gym ID: </p>
                    <p id="gymDateDisplay">Date of Birth: </p>
                    <p id="gymExperienceDisplay">Experience: </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('gymForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const gymId = document.getElementById('inputId').value;
        const gymName = document.getElementById('inputName').value;
        const gymDate = document.getElementById('inputDate').value;
        const gymExperience = document.getElementById('inputExperience').value;
        const gymImage = document.getElementById('inputImage').files[0];

        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('gymImage').src = e.target.result;
        }
        reader.readAsDataURL(gymImage);

        document.getElementById('gymIdDisplay').innerText = 'GYM ID: ' + gymId;
        document.getElementById('gymNameDisplay').innerText = 'Gym Name: ' + gymName;
        document.getElementById('gymDateDisplay').innerText = 'Date of Birth: ' + gymDate;
        document.getElementById('gymExperienceDisplay').innerText = 'Experience: ' + gymExperience;
    });
</script>
</body>
</html>
