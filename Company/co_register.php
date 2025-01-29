<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .form-container {
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      padding: 40px;
      max-width: 600px;
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

    .form-select {
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

    textarea {
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .text-center {
      margin-top: 20px;
    }

    hr {
      border-top: 2px solid #4CAF50;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: #4CAF50;
      box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="form-container">
      <h2 class="text-center mb-4">Company Registration Form</h2>
      <hr>
      <form action="co_insert.php" method="post">
        <div class="mb-3">
          <label for="companyName" class="form-label">Company Name</label>
          <input type="text" class="form-control" id="companyName" name="comname" placeholder="Enter company name" required>
        </div>
        <div class="mb-3">
          <label for="companyEmail" class="form-label">Company Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter company email" required>
        </div>
        <div class="mb-3">
          <label for="businessType" class="form-label">Type of Business</label>
          <select class="form-select" id="businessType" name="busstype" required>
            <option value="" disabled selected>Select business type</option>
            <option value="soleProprietorship">Sole Proprietorship</option>
            <option value="partnership">Partnership</option>
            <option value="privateLimited">Private Limited</option>
            <option value="others">Others</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="businessActivity" class="form-label">Business Activity</label>
          <textarea class="form-control" id="businessActivity" rows="3" name="activity" placeholder="Describe your business activity" required></textarea>
        </div>
        <div class="mb-3">
          <label for="registeredAddress" class="form-label">Registered Address</label>
          <textarea class="form-control" id="registeredAddress" rows="2" name="address" placeholder="Enter registered address" required></textarea>
        </div>
        <div class="mb-3">
          <label for="ownerName" class="form-label">Owner Name</label>
          <input type="text" class="form-control" id="ownerName" name="owner" placeholder="Enter owner name" required>
        </div>
        <div class="mb-3">
          <label for="Password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-custom w-50">Register</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
