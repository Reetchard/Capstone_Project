<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
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
                <a class="navbar-link" href="#">Manage Account</a>
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

<!-- Manage Account Section -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Manage Account</h2>
            <div class="form-inline">
                <input type="text" id="searchAccountId" class="form-control mr-2" placeholder="Search by ID">
                <button class="btn btn-primary" onclick="searchAccount()">Search</button>
                <button class="btn btn-success ml-auto" data-toggle="modal" data-target="#accountModal">Add Account</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="accountInfoBody">
                    <!-- Account information will be populated here -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add/Edit Account Modal -->
<div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="accountModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accountModalLabel">Add/Edit Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="accountForm">
                    <input type="hidden" id="accountKey">
                    <div class="form-group">
                        <label for="accountId">ID</label>
                        <input type="text" name="accountId" class="form-control" id="accountId" placeholder="Enter ID" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" class="form-control" id="role" placeholder="Enter Role" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
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
    const accountRef = database.ref('accounts');

    // Function to display account information
    function displayAccountInfo() {
        accountRef.on('value', function(snapshot) {
            const accounts = snapshot.val();
            const accountInfoBody = document.getElementById('accountInfoBody');
            accountInfoBody.innerHTML = '';

            for (const key in accounts) {
                if (accounts.hasOwnProperty(key)) {
                    const account = accounts[key];
                    const row = document.createElement('tr');

                    row.innerHTML = `
                        <td>${account.id}</td>
                        <td>${account.username}</td>
                        <td>${account.email}</td>
                        <td>${account.role}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editAccount('${key}')">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteAccount('${key}')">Delete</button>
                        </td>
                    `;

                    accountInfoBody.appendChild(row);
                }
            }
        });
    }

    // Function to search account by ID
    function searchAccount() {
        const searchId = document.getElementById('searchAccountId').value;
        if (searchId) {
            accountRef.orderByChild('id').equalTo(searchId).on('value', function(snapshot) {
                const accounts = snapshot.val();
                const accountInfoBody = document.getElementById('accountInfoBody');
                accountInfoBody.innerHTML = '';

                for (const key in accounts) {
                    if (accounts.hasOwnProperty(key)) {
                        const account = accounts[key];
                        const row = document.createElement('tr');

                        row.innerHTML = `
                            <td>${account.id}</td>
                            <td>${account.username}</td>
                            <td>${account.email}</td>
                            <td>${account.role}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editAccount('${key}')">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteAccount('${key}')">Delete</button>
                            </td>
                        `;

                        accountInfoBody.appendChild(row);
                    }
                }
            });
        } else {
            displayAccountInfo();
        }
    }

    // Function to add or edit account
    document.getElementById('accountForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const accountKey = document.getElementById('accountKey').value;
        const id = document.getElementById('accountId').value;
        const username = document.getElementById('username').value;
        const email = document.getElementById('email').value;
        const role = document.getElementById('role').value;

        const accountData = {
            id,
            username,
            email,
            role
        };

        if (accountKey) {
            accountRef.child(accountKey).update(accountData);
        } else {
            accountRef.push(accountData);
        }

        $('#accountModal').modal('hide');
        displayAccountInfo();
    });

    // Function to edit account
    function editAccount(key) {
        accountRef.child(key).once('value').then(function(snapshot) {
            const account = snapshot.val();

            document.getElementById('accountKey').value = key;
            document.getElementById('accountId').value = account.id;
            document.getElementById('username').value = account.username;
            document.getElementById('email').value = account.email;
            document.getElementById('role').value = account.role;

            $('#accountModal').modal('show');
        });
    }

    // Function to delete account
    function deleteAccount(key) {
        if (confirm('Are you sure you want to delete this account?')) {
            accountRef.child(key).remove();
            displayAccountInfo();
        }
    }

    // Initial call to display account information
    displayAccountInfo();
</script>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-c6b6peSFAvCmMF6h1GaaMRz/wE/Blw2vGr/28d8R8AznkLL8pWNhcKfK5dxXzgxm" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
