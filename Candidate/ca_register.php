<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Candidate Registration Form</title>
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
      <h2 class="text-center mb-4">Candidate Registration Form</h2>
      <hr>
      <form action="ca_insert.php" method="post">
        <div class="mb-3">
          <label for="fullName" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter full name" required>
        </div>
        <div class="mb-3">
          <label for="dob" class="form-label">Date of Birth</label>
          <input type="date" class="form-control" id="dob" name="dob" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" id="address" rows="2" name="address" placeholder="Enter address" required></textarea>
        </div>
        <div class="mb-3">
          <label for="latestEducation" class="form-label">Latest Education</label>
          <select class="form-select" id="latestEducation" name="education" required>
            <option value="" disabled selected>Select education level</option>
            <option value="10th">10th</option>
            <option value="12th">12th</option>
            <option value="graduation">Graduation</option>
            <option value="postGraduation">Post Graduation</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="marks" class="form-label">Marks (CGPA/SGPA)</label>
          <input type="text" class="form-control" id="marks" name="marks" placeholder="Enter marks" required>
        </div>
        <div class="mb-3">
          <label for="workExperience" class="form-label">Work Experience</label>
          <select class="form-select" id="workExperience" name="workexp" required>
            <option value="" disabled selected>Select experience</option>
            <option value="1">0 - 1 year</option>
            <option value="1">1 year</option>
            <option value="2">2 years</option>
            <option value="3">3 years</option>
            <option value="4">4 years</option>
            <option value="5">5 years</option>
            <option value="moreThan5">More than 5 years</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="skills" class="form-label">Skills</label>
          <textarea class="form-control" id="skills" rows="3" name="skill" placeholder="Enter your skills" required style="width: 100%; height: 80px;"></textarea>
        </div>
        <div class="mb-3">
          <label for="linkedin" class="form-label">LinkedIn Profile</label>
          <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="Enter LinkedIn profile URL">
        </div>
        <div class="mb-3">
          <label for="portfolio" class="form-label">Protfolio</label>
          <input type="url" class="form-control" id="portfolio" name="protfolio" placeholder="Enter portfolio URL">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm password" required>
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
