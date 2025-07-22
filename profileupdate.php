<?php

include 'connection.php';

$id = $_GET['updateid'];
// echo $id;

$sql = "select * from `usersdata`.`users` where id=$id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];

// echo $id;
// echo $username;
// echo $email;
// echo $password;



?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Styles -->
  <style>
    body {
      background-color: #f8f9fa;
    }

    .profile-header {
      background: linear-gradient(to right, #0d6efd, #6610f2);
      color: white;
      border-radius: .5rem .5rem 0 0;
      padding: 2rem;
    }

    .form-control:focus {
      border-color: #6610f2;
      box-shadow: 0 0 0 .25rem rgba(102, 16, 242, 0.25);
    }

    .success-message {
      display: none;
    }
  </style>
</head>

<body>

  <div class="container mt-5">
    <div class="card shadow">
      <div class="profile-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Welcome, <span id="profileName">John Doe</span></h3>
        <button class="btn btn-outline-light">Logout</button>
      </div>

      <div class="card-body">
        <div class="alert alert-success success-message" id="successMsg">
          ✅ Your profile was updated successfully!
        </div>

        <form id="profileForm">
          <div class="mb-3">
            <label for="username" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="username" value=<?php echo $username?> required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" value=<?php echo $email?> required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" value=<?php echo $password?> required>
          </div>

          <button type="submit" class="btn btn-primary w-100">💾 Save Changes</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (optional for UI interactivity) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom JS -->
  <script>
    document.getElementById('profileForm').addEventListener('submit', function(e) {
      e.preventDefault();

      // Simulate saving and update profile name
      const name = document.getElementById('username').value;
      document.getElementById('profileName').innerText = name;

      // Show success message
      const msg = document.getElementById('successMsg');
      msg.style.display = 'block';

      // Auto-hide after 3 seconds
      setTimeout(() => {
        msg.style.display = 'none';
      }, 3000);
    });
  </script>

</body>

</html>