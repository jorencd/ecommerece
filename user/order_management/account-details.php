<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Information</title>

  <link rel="stylesheet" href="../../assets/Bootstrap/css/bootstrap.css">

  <script src="../../assets/Bootstrap/js/bootstrap.bundle.js"></script>

  <!-- BOOTSTRAP ICON -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- FONT AWESOME CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .profile-background {
      background: url('../../assets/image/profile-background.jpeg') no-repeat center center;
      background-size: cover;
      width: 100%;
      height: 150px;
    }

    footer a {
      color: white !important;
    }
  </style>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar fixed-top bg-light shadow-sm">
    <!-- NAVBAR CONTAINER -->
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <div>
        <a class="navbar-brand" href="../../user/user_auth/index.php">
          <button class="btn btn-sm px-1">
            <i class="bi bi-arrow-left-short text-dark fs-1 fw-bold" style="font-size: 1.5rem;"></i>
          </button>
        </a>
      </div>

      <div class="ms-4">
        <a class="navbar-brand me-0 dm-serif-display letter-spacing-1 text-dark " href="../../user/user_auth/index.php">
          <img src="../../assets/image/logo.png" alt="Interllux Logo" width="30" height="24">
          Interllux
        </a>
      </div>


      <div class="d-flex">
        <div class="row">
          <div class="col"></div>
          <div class="col"></div>
          <div class="col"></div>
          <div class="col"></div>
        </div>
      </div>

    </div>
  </nav>
  <!-- END NAVBAR -->

  <!-- PROFILE BACKGROUND-->
  <div class="profile-background container-fluid mt-5 pt-3">
    <h5 class="pt-5 ms-3">Hi! Orlando</h5>
  </div>

  <div class="container-fluid px-3 py-3">
    <div class="container-fluid  d-flex justify-content-end mb-3 mt-3">
      <!-- EDIT BUTTONS -->
      <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editUsernameModal">
        Edit Username or Password
      </button>
      <button class="btn btn-light border-dark ms-4" data-bs-toggle="modal" data-bs-target="#editDetailsModal">
        Edit Account Details
      </button>
    </div>
  </div>
  <hr class="mt-4">
  </div>

  <div class="container">
    <!-- DISPLAY ACCOUNT DETAILS -->
    <h5 class="mb-4 mt-3">Account Details</h4>
      <form>
        <div class="row mb-4">
          <!-- DISPLAY USERNAME -->
          <div class="col-md-6">
            <label for="username" class="form-label">User Name</label>
            <input type="text" id="username" class="form-control" value="@Orlandzzz" disabled>
          </div>
          <!-- DISPLAY PASSWORD -->
          <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" class="form-control" value="password123" disabled>
          </div>
        </div>
        <hr>

        <!-- DISPLAY PERSONAL INFORMATION -->
        <h5 class="mt-3 mb-3">Personal Information</h5>
        <div class="row">

          <!-- DISPLAY FIRST NAME -->
          <div class="col-md-3 mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" id="firstName" class="form-control" value="Orlando Jr." disabled>
          </div>

          <!-- DISPLAY LAST NAME-->
          <div class="col-md-3 mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" id="lastName" class="form-control" value="Dela Cruz" disabled>
          </div>

          <!-- DISPLAY EMAIL-->
          <div class="col-md-3 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" value="delacruzorlando776@gmail.com" disabled>
          </div>

          <!-- DISPLAY CONTACT NUMBER-->
          <div class="col-md-3 mb-3">
            <label for="contact" class="form-label">Contact Number</label>
            <input type="tel" id="contact" class="form-control" value="09095984478" disabled>
          </div>
        </div>

        <hr>

        <!-- DISPLAY ADDRESS INFO -->
        <h5 class="mt-3 mb-3">Shipping Address</h5>
        <div class="row">

          <!-- DISPLAY STREET ADDRESS-->
          <div class="col-md-4 mb-3">
            <label for="street" class="form-label">Street Address</label>
            <input type="text" id="street" class="form-control" value="Bañagale Street" disabled>
          </div>

          <!-- DISPLAY BARANGGAY -->
          <div class="col-md-4 mb-3">
            <label for="barangay" class="form-label">Barangay</label>
            <input type="text" id="barangay" class="form-control" value="Brgy. San Jose" disabled>
          </div>

          <!-- DISPLAY CITY-->
          <div class="col-md-4 mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" id="city" class="form-control" value="San Pablo City" disabled>
          </div>
        </div>

        <div class="row">
          <!-- DISPLAY PROVINCE -->
          <div class="col-md-4 mb-3">
            <label for="province" class="form-label">Province</label>
            <input type="text" id="province" class="form-control" value="Laguna" disabled>
          </div>
          <!-- DISPLAY ZIP CODE -->
          <div class="col-md-4 mb-3">
            <label for="zipcode" class="form-label">ZIP Code</label>
            <input type="number" id="zipcode" class="form-control" value="4000" disabled>
          </div>

          <!-- DISPLAY COUNTRY -->
          <div class="col-md-4 mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" id="country" class="form-control" value="Philippines" disabled>
          </div>
        </div>
      </form>
  </div>

  <!-- EDIT USERNAME/PASSWORD -->
  <div class="modal fade" id="editUsernameModal" tabindex="-1" aria-labelledby="editUsernameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editUsernameModalLabel">Edit Username or Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <!-- EDIT USERNAME-->
            <div class="mb-3">
              <label for="editUsername" class="form-label">User Name</label>
              <input type="text" id="editUsername" class="form-control shadow-none">
            </div>
            <!-- EDIT PASSWORD -->
            <div class="mb-3">
              <label for="editPassword" class="form-label">Password</label>
              <input type="password" id="editPassword" class="form-control shadow-none">
            </div>
            <!-- CONFIRM PASSWORD -->
            <div class="mb-3">
              <label for="editConfirmPassword" class="form-label">Confirm Password</label>
              <input type="password" id="editConfirmPassword" class="form-control shadow-none">
            </div>
          </form>
        </div>
        <!-- BUTTONS SAVE/CANCEL -->
        <div class="modal-footer">
          <button type="button" class="btn btn-light border-dark" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-dark">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- EDIT ACCOUNT DETAILS -->
  <div class="modal fade" id="editDetailsModal" tabindex="-1" aria-labelledby="editDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editDetailsModalLabel">Edit Account Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <!-- EDIT FIRST NAME -->
            <div class="mb-3">
              <label for="editFirstName" class="form-label">First Name</label>
              <input type="text" id="editFirstName" class="form-control shadow-none">
            </div>
            <!-- EDIT LAST NAME -->
            <div class="mb-3">
              <label for="editLastName" class="form-label">Last Name</label>
              <input type="text" id="editLastName" class="form-control shadow-none">
            </div>
            <!-- EDIT EMAIL -->
            <div class="mb-3">
              <label for="editEmail" class="form-label">Email</label>
              <input type="email" id="editEmail" class="form-control shadow-none">
            </div>
            <!-- EDIT CONTACT NUMBER -->
            <div class="mb-3">
              <label for="editContact" class="form-label">Contact Number</label>
              <input type="tel" id="editContact" class="form-control shadow-none">
            </div>
            <!-- EDIT STREET ADDRESS -->
            <div class="mb-3">
              <label for="editStreet" class="form-label">Street Address</label>
              <input type="text" id="editStreet" class="form-control shadow-none">
            </div>
            <!-- EDIT BARANGGAY -->
            <div class="mb-3">
              <label for="editBarangay" class="form-label">Barangay</label>
              <input type="text" id="editBarangay" class="form-control shadow-none">
            </div>

            <!-- EDIT SHIPPING REGION -->
            <div class="mb-3">
              <label for="editRegion" class="form-label">Region</label>
              <select id="editRegion" class="form-control shadow-none border-secondary">
                <option value="Manila Region">Manila Region</option>
                <option value="Laguna Province">Laguna Province</option>
              </select>
            </div>

            <!-- EDIT CITY -->
            <div class="mb-3">
              <label for="editCity" class="form-label">City/Municipality</label>
              <select id="editCity" class="form-control shadow-none border-secondary">
                <!-- Cities will be dynamically filtered based sa napiling region -->
              </select>
            </div>

            <!-- EDIT ZIP CODE-->
            <div class="mb-3">
              <label for="editZipcode" class="form-label">ZIP Code</label>
              <input type="number" id="editZipcode" class="form-control shadow-none">
            </div>
            <!--EDIT COUNTRY -->
            <div class="mb-3">
              <label for="editCountry" class="form-label">Country</label>
              <input type="text" id="editCountry" class="form-control shadow-none border-secondary" value="Philippines" readonly>
            </div>
          </form>

        </div>
        <!--BUTTONS SAVE/CANCEL-->
        <div class="modal-footer">
          <button type="button" class="btn btn-light border-dark" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-dark">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <div id="footer">
    <script src="../../assets/js/footer.js"></script>
  </div>

  <script>
    // Data for cities in each region
    const cities = {
      "Laguna Province": [
        "Alaminos", "Bay", "Biñan", "Cabuyao", "Calamba", "Calauan",
        "Cavinti", "Famy", "Kalayaan", "Liliw", "Los Baños",
        "Luisiana", "Lumban", "Mabitac", "Magdalena", "Majayjay",
        "Nagcarlan", "Paete", "Pagsanjan", "Pakil", "Pangil",
        "Pila", "Rizal", "San Pablo", "San Pedro", "Santa Cruz",
        "Santa Maria", "Santa Rosa", "Siniloan", "Victoria"
      ],
      "Manila Region": [
        "Caloocan", "Las Piñas", "Makati", "Malabon", "Mandaluyong",
        "Manila", "Marikina", "Muntinlupa", "Navotas", "Parañaque",
        "Pasay", "Pasig", "Quezon City", "San Juan", "Taguig",
        "Valenzuela", "Pateros"
      ]
    };
    // HTML elements
    const regionSelect = document.getElementById("editRegion");
    const citySelect = document.getElementById("editCity");

    // Function to populate cities based on selected region
    function populateCities(region) {
      // Clear previous options
      citySelect.innerHTML = "";

      // Add new options
      cities[region].forEach(city => {
        const option = document.createElement("option");
        option.value = city;
        option.textContent = city;
        citySelect.appendChild(option);
      });
    }

    // Event listener for region selection change
    regionSelect.addEventListener("change", () => {
      const selectedRegion = regionSelect.value;
      populateCities(selectedRegion);
    });

    // Initialize the city dropdown with the default region
    populateCities(regionSelect.value);
  </script>
</body>

</html>