<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $candidate_id = intval($_GET['id']);
} else {
    echo "<script>
        alert('Invalid Candidate ID. Redirecting...');
        window.location.href = 'ca_dashboard.php';
    </script>";
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apply Job </title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .job-card {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 15px;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      position: relative;
    }
    .job-card img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 50%;
      margin-right: 15px;
    }
    .job-details {
      flex-grow: 1;
    }
    .job-time {
      color: green;
      font-weight: bold;
    }
    .close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 18px;
      cursor: pointer;
    }
    .promoted {
      background-color: #f5f5f5;
    }
  </style>
</head>
<body>
        <main>
            

<?php
    include "../connection.php";

    $sql="SELECT * FROM `JOB_LISTINGS` ORDER BY `id` DESC";
    $result=mysqli_query($conn, $sql);

    // Check if tasks are available
    if (mysqli_num_rows($result)>0) {
        // Start the HTML structure
        echo '<div class="container mt-4">';
        
        while($rows=mysqli_fetch_assoc($result)) {
            // Job card structure
            echo '<div class="job-card" style="position: relative; padding: 20px; border: 1px solid #ddd; border-radius: 8px; display: flex; align-items: center; margin-bottom: 20px;">';
            echo '    <img src="https://via.placeholder.com/50" alt="Company Logo" style="margin-right: 20px;">';
            echo '    <div class="job-details">';
            echo '        <h5 class="mb-1">' . htmlspecialchars($rows['job_title']) . '</h5>';
            echo '        <p class="mb-1 text-muted">Company: ' . htmlspecialchars($rows['company_name']) . '</p>';
            echo '        <p class="job-time">email: ' . htmlspecialchars($rows['email']) . '</p>';
            echo '        <p class="mb-1 text-muted">Description: ' . htmlspecialchars($rows['job_description']) . '</p>';
            echo '        <p class="mb-1 text-muted">Location: ' . htmlspecialchars($rows['location']) . '</p>';
            echo '        <p class="job-time">Deadline: ' . htmlspecialchars($rows['application_deadline']) . '</p>';
            echo '        <div class="d-flex justify-content-end">';
            echo '            <a href="application.php?task_id=' . $rows['id'] . '&candidate_id=' . $candidate_id . '"><button class="btn btn-primary">Apply Job</button></a>';
            echo '        </div>';
            echo '    </div>';
            echo '    <span class="close-btn" onclick="return confirm(\'Are you sure you want to delete this task?\')">&times;</span>';
            echo '</div>';
        }
        
        // Close the container div
        echo '</div>';
    } else {
        echo '<p>No tasks found.</p>';
    }

    // Close the database connection
    $conn->close();
?>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>