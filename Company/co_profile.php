<?php 
include "../connection.php";
$Id = $_GET['id'];

$sql = "SELECT * FROM COMPANY WHERE ID=$Id";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Profile</title>
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
      <h2 class="text-center mb-4">Company Profile</h2>
      <hr>
      <form action="co_update.php" method="post" id="profileForm" onsubmit="submitForm(event)">
      <div class="mb-3">
  <label for="id" class="form-label">Id</label>
  <input type="number" class="form-control" id="id" name="id_display" value="<?php echo $rows['Id']; ?>" readonly>
  <input type="hidden" name="id" value="<?php echo $rows['Id']; ?>">
</div>


        <div class="mb-3">
          <label for="companyName" class="form-label">Company Name</label>
          <input type="text" class="form-control" id="companyName" name="comname" value="<?php echo $rows['Company Name']; ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $rows['Email']; ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="businessType" class="form-label">Type of Business</label>
          <select class="form-select" id="businessType" name="busstype" disabled>
            <option value="soleProprietorship" <?php echo ($rows['Bussiness Type'] == 'soleProprietorship') ? 'selected' : ''; ?>>Sole Proprietorship</option>
            <option value="partnership" <?php echo ($rows['Bussiness Type'] == 'partnership') ? 'selected' : ''; ?>>Partnership</option>
            <option value="privateLimited" <?php echo ($rows['Bussiness Type'] == 'privateLimited') ? 'selected' : ''; ?>>Private Limited</option>
            <option value="others" <?php echo ($rows['Bussiness Type'] == 'others') ? 'selected' : ''; ?>>Others</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="businessActivity" class="form-label">Business Activity</label>
          <textarea class="form-control" id="businessActivity" rows="3" name="activity" readonly><?php echo htmlspecialchars($rows['Bussiness Activity']); ?></textarea>
        </div>
        <div class="mb-3">
          <label for="registeredAddress" class="form-label">Registered Address</label>
          <textarea class="form-control" id="registeredAddress" rows="2" name="address" readonly><?php echo htmlspecialchars($rows['Address']); ?></textarea>
        </div>
        <div class="mb-3">
          <label for="ownerName" class="form-label">Owner Name</label>
          <input type="text" class="form-control" id="ownerName" name="owner" value="<?php echo $rows['Owner']; ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" value="<?php echo $rows['Password']; ?>" readonly>
        </div>
        <div class="text-center">
          <button type="button" class="btn btn-custom w-50" id="editButton" onclick="toggleEditMode()">Edit Profile</button>
          <center><button type="submit" class="btn btn-primary w-50" id="updateButton" style="display:none;">Update Profile</button></center>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function toggleEditMode() {
      const inputs = document.querySelectorAll('#profileForm .form-control, #profileForm .form-select');
      const editButton = document.getElementById('editButton');
      const updateButton = document.getElementById('updateButton');

      inputs.forEach(input => {
        input.readOnly = !input.readOnly;
        input.disabled = !input.disabled;
      });

      editButton.style.display = editButton.style.display === 'none' ? 'block' : 'none';
      updateButton.style.display = updateButton.style.display === 'none' ? 'block' : 'none';
    }

    function submitForm(event) {
      event.preventDefault();
      document.getElementById('profileForm').submit();
    }
  </script>
   <script src="script.js"></script>
</body>

</html>
