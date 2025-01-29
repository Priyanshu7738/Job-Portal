<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .form-container {
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      padding: 40px;
      max-width: 400px;
      margin: 50px auto;
    }

    h2 {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #4CAF50;
      font-weight: 600;
    }

    .form-control {
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .input-group-text {
      border-radius: 10px 0 0 10px;
      border-right: none;
      background-color: #f8f9fa;
      color: #4CAF50;
    }

    .btn-custom {
      background-color: #007bff;
      color: white;
      padding: 10px 30px;
      font-size: 16px;
      border-radius: 20px;
      transition: background-color 0.3s ease;
    }

    .btn-custom:hover {
      background-color: #0056b3;
    }

    .btn-custom:focus {
      outline: none;
      box-shadow: 0 0 0 0.25rem rgba(38, 143, 255, 0.5);
    }

    .form-label {
      font-weight: 500;
    }

    .text-center {
      margin-top: 20px;
    }

    .signup-link {
      color: #007bff;
      text-decoration: none;
    }

    .signup-link:hover {
      text-decoration: underline;
    }

    hr {
      border-top: 2px solid #4CAF50;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="form-container">
      <h2 class="text-center mb-4">Company Login</h2>
      <hr>
      <form action="co_login_ins.php" method="post" autocomplete="off">
        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
          <input type="email" class="form-control" id="companyEmail" name="email" placeholder="Enter email" autocomplete="off" required>
        </div>
        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="fas fa-lock"></i></span>
          <input type="password" class="form-control" id="companyPassword" name="password" placeholder="Enter password" autocomplete="off" required>
          <button type="button" class="btn btn-outline-secondary" id="toggleCompanyPassword">
            <i class="fas fa-eye"></i>
          </button>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-custom w-50">Login</button>
        </div>
        <div class="text-center mt-3">
        <label for="" class="form-label">
              Don't have an account? &NonBreakingSpace;
          <a href="co_register.php" class="signup-link">Sign up</a>
    </label>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('toggleCompanyPassword').addEventListener('click', function () {
      const passwordField = document.getElementById('companyPassword');
      const icon = this.querySelector('i');
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        passwordField.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });
  </script>
</body>

</html>
