<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "style.css">
    <title>Login</title>
  
    <style>
              img {
          width: 100%;
      }
      .login {
          height: 100vh;
          width: 100%;
          background: radial-gradient(#653d84, #332042);
          position: relative;
          background: url(../Capstone/img/BG.png) no-repeat center center/cover;
      }
      .login_box {
          width: 90%;
          max-width: 1050px;
          height: 600px;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          background: #fff;
          border-radius: 10px;
          box-shadow: 1px 4px 22px -8px #0004;
          display: flex;
          overflow: hidden;
      }
      .login_box .left {
          width: 100%;
          max-width: 41%;
          height: 100%;
          padding: 25px;
          background: linear-gradient(-45deg, #dcd7e0, #fff);
      }
      .login_box .right {
          width: 59%;
          height: 100%;
          background: linear-gradient(212.38deg, rgba(2,2,2, 0.7) 0%, rgba(175, 70, 189, 0.71) 100%), url('img/gallery5.png');
          background-size: cover;
          color: #fff;
          position: relative;
      }
      .left .top_link a {
          color: #452A5A;
          font-weight: 400;
      }
      .left .contact {
          display: flex;
          flex-direction: column; /* Stack elements vertically */
          align-items: center;
          justify-content: center;
          height: 100%;
          width: 73%;
          margin: auto;
      }
      .left h3 {
          text-align: center;
          margin-bottom: 20px; /* Adjusted margin */
      }
      .left input {
          border: none;
          width: 100%;
          margin: 10px 0; /* Reduced margin */
          border-bottom: 1px solid #4f30677d;
          padding: 7px 9px;
          overflow: hidden;
          background: transparent;
          font-weight: 600;
          font-size: 14px;
      }
      .error-message {
          color: red;
          text-align: center;
          margin-top: 10px; /* Adjusted margin */
      }
      .submit {
          border: none;
          padding: 15px 70px;
          border-radius: 8px;
          display: block;
          margin: 20px auto 10px; /* Adjusted margin */
          background: #583672;
          color: #fff;
          font-weight: bold;
          box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
      }
            .left .contact {
          display: flex;
          flex-direction: column; /* Stack elements vertically */
          align-items: center;
          justify-content: center;
          height: 100%;
          width: 73%;
          margin: auto;
      }
            .left .contact form {
          width: 100%; /* Ensure form takes full width */
      }

            .remember-me {
          display: flex;
          align-items: center;
          justify-content: flex-start; /* Align items to the start */
          margin: 10px 0; /* Adjust margin */
      }
            .remember-me input {
          margin-right: 5px; /* Reduced margin */
          transform: scale(1.1); /* Adjust checkbox size */
      }

      .remember-me label {
          font-size: 13px; /* Adjusted font size */
          font-weight: 400;
          margin-left: 5px; /* Space between checkbox and label */
      }
      .sign-up-link {
          text-align: center;
          margin-top: 15px;
      }
      .sign-up-link a {
          color: #583672;
          text-decoration: none;
      }
      .right .right-text {
          height: 100%;
          position: relative;
          transform: translate(0%, 45%);
      }
      .right-text h2 {
          text-align: center;
          font-size: 50px;
          font-weight: 500;
      }
      .right-text h5 {
          text-align: center;
          font-size: 19px;
          font-weight: 400;
      }
      .right .right-inductor {
          position: absolute;
          width: 70px;
          height: 7px;
          background: #fff0;
          left: 50%;
          bottom: 70px;
          transform: translate(-50%, 0%);
      }
      .top_link img {
          width: 28px;
          padding-right: 7px;
          margin-top: -3px;
      }
      @media (max-width: 768px) {
          .login_box {
              flex-direction: column;
              height: auto;
              width: 95%;
              max-width: 700px;
          }
          .login_box .left, .login_box .right {
              width: 100%;
              max-width: none;
              padding: 20px;
          }
      }

    </style>
</head>
<body>
    <section class="login">
        <div class="login_box">
            <div class="left">
                <div class="top_link">
                    <a href="Dashboard.html">
                        <img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return home
                    </a>
                </div>
                <div class="contact">
                    <form id="loginForm">
                        <h3>SIGN IN</h3>
                        <input type="text" id="username" name="user" placeholder="USERNAME or EMAIL">
                        <input type="password" id="password" name="pass" placeholder="PASSWORD">
                        <div class="remember-me">
                            <input type="checkbox" id="rememberMe">
                            <label for="rememberMe">Remember Me</label>
                        </div>
                        <button type="submit" class="submit">LET'S GO</button>
                        <div id="error-message" class="error-message"></div>
                        <div class="sign-up-link">
                            <p>Don't have an account? <a href="signup.html">Sign Up Now</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="right-text">
                    <h2>PEAK PULSE</h2>
                    <h5>Booking Management</h5>
                </div>
                <div class="right-inductor">
                    <img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Firebase SDKs -->
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-auth.js"></script>
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

        // Login Function
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const rememberMe = document.getElementById('rememberMe').checked;
            const errorMessage = document.getElementById('error-message');
            
            // Clear previous error message
            errorMessage.textContent = '';

            if (username === '' || password === '') {
                errorMessage.textContent = 'Please enter both username and password.';
                return;
            }

            // Check if username is an email address or needs to be converted
            let email = username.includes('@') ? username : `${username}@example.com`;

            firebase.auth().signInWithEmailAndPassword(email, password)
                .then((userCredential) => {
                    if (rememberMe) {
                        firebase.auth().setPersistence(firebase.auth.Auth.Persistence.LOCAL)
                            .then(() => {
                                // Redirect to Dashboard page
                                window.location.href = "Dashboard.html";
                            })
                            .catch((error) => {
                                errorMessage.textContent = 'Error setting persistence: ' + error.message;
                            });
                    } else {
                        // Redirect to Dashboard page
                        window.location.href = "Dashboard.html";
                    }
                })
                .catch((error) => {
                    errorMessage.textContent = 'Error: ' + error.message;
                });
        });

        // Handle Sign Up Link
        document.querySelector('.sign-up-link a').addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = "signup.html";
        });
    </script>
</body>
</html>
