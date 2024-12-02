<!doctype html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Signin</title>


  <!--###### BOOTSTRAP ICON LINK #####-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../../assets/Bootstrap/css/bootstrap.css">
  <link href="../../assets/css/loginpage.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">


  <style>
    input {
      box-shadow: none !important;
    }
  </style>
</head>


<body>
  <img src="image/bag-hanging-from-furniture-item-indoors.jpg" alt="">

  <!-- NAVBAR -->
  <nav class="navbar bg-body-tertiary fixed-top shadow-sm py-0">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" id="back-button">
        <button class="btn btn-sm px-1">
          <i class="bi bi-arrow-left-short text-dark fs-1 fw-bold" style="font-size: 1.5rem;"></i>
        </button>
      </a>
      <a class="navbar-brand mx-auto dm-serif-display letter-spacing-1 text-dark" href="../../user/user_auth/index.php">
        <img src="../../assets/image/logo.png" alt="Interllux Logo" width="30" height="24"> Interllux
      </a>
    </div>
  </nav>

  <div class="container-fluid form-signin text-center mt-5 pt-5">
    <!-- Sign In Form -->
    <form class="mb-5" id="signInForm" action="../user_auth/Signin.php" method="POST" style="background-color:rgba(255, 255, 255, 0.212); backdrop-filter: blur(15px);">
      <img class="mb-4" src="../../assets/image/logo.png" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal text-light">Please sign in</h1>


      <div class="form-floating">
        <input type="email" class="form-control text-light" id="signInEmail" name="email" placeholder="Email" required>
        <label class="text-light fill" for="signInEmail">Email</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="signInPassword" name="password" placeholder="Password" required>
        <label class="text-light fill" for="signInPassword">Password</label>
      </div>
      <div class="checkbox mb-3 mt-3">
        <label class="text-light"><input type="checkbox" name="remember_me" value="remember-me"> Remember me</label>
      </div>
      <button class="w-100 btn btn-lg btn-dark mt-1" type="submit" name="signIn">Sign in</button>
      <p>Don't have an account? <a href="#" onclick="toggleForms()">Sign up</a></p>
    </form>


    <!-- Sign Up Form -->
    <form id="signUpForm" action="../user_auth/Signup.php" method="POST" style="display:none; background-color:rgba(255, 255, 255, 0.212); backdrop-filter: blur(15px);">
      <img class="mb-4" src="../../assets/image/logo.png" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal text-light">Please sign up</h1>


      <div class="form-floating">
        <input type="text" class="form-control" id="signUpFirstName" name="first_name" placeholder="First Name" required>
        <label class="text-light fill" for="signUpFirstName">First Name</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="signUpLastName" name="last_name" placeholder="Last Name" required>
        <label class="text-light fill" for="signUpLastName">Last Name</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control" id="signUpEmail" name="email" placeholder="Email" required>
        <label class="text-light fill" for="signUpEmail">Email Address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="signUpPassword" name="password" placeholder="Password" required>
        <label class="text-light fill" for="signUpPassword">Password</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="signUpConfirmPassword" name="confirm_password" placeholder="Confirm Password" required>
        <label class="text-light fill" for="signUpConfirmPassword">Confirm Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-dark" type="submit" name="signUp">Sign up</button>
      <p>Already have an account? <a href="#" onclick="toggleForms()">Sign in</a></p>
    </form>
  </div>


  <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="errorModalLabel">Error</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalMessage"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('back-button').addEventListener('click', function(e) {
      e.preventDefault();
      window.location.href = '../../user/user_auth/logout.php'; // Redirect to logout
    });
  </script>
  <script src="../../assets/js/loginpage.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>


</html>