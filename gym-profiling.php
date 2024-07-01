<?php
include "config.php";

if (isset($_REQUEST["submit"])) {
    $id = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $date = $_REQUEST["date"];
    $experience = $_REQUEST["experience"];

    $ins = "INSERT INTO coach (id,name, date,experience) VALUES ('$id','$name','$date','$experience')";
    $query1 = mysqli_query($connection, $ins);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing - Gym Management System</title>
    <link rel= "stylesheet" href = "style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        /* Custom styles */
        body {
            padding: 20px;
            background: url('../Capstone/img/BG.png') no-repeat center center fixed; /* Background image */
            background-size: cover; /* Cover the entire page */
            opacity: 0.9;

        }
        .card {
            background-color: rgba(255, 255, 255, 0.0); /* Semi-transparent background */
            margin-top: 50px;
            padding: 20px;
            box-shadow: 0 7px 9px rgba(0,0,0,0.1); /* Card shadow */
            transition: box-shadow 0.5s ease;
            
        }
        .card:hover {
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .btn-primary {
            background-color: #007bff; /* Blue primary button */
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9; /* Darker blue on hover */
            border-color: #0062cc;
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent navbar background */
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="admin-login.php"><img src="img/TT.png" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Gym Management System</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="members.php">Members</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="membership.php">Membership</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reservation.php">Reservations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="billing.php">Billing</a>
            </li>
        </ul>
    </div>
</nav>
<!-- Navigation Bar ends -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Gym Profiling Registration</h4>
                </div>
                <div class="card-body">
                    <!-- Form start -->
                    <form>
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
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
                    </form>
                    <!-- Form end -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
