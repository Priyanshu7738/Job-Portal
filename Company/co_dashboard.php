<?php 
include "../connection.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $Id = $_GET['id'];
    
    $sql = "SELECT * FROM COMPANY WHERE ID=$Id";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
    } else {
        echo "<h3>No CANDIDATE found with the provided ID.</h3>";
    }
} else {
    echo "<h3>Invalid or missing ID. Redirecting...</h3>";
    header("Refresh:3; url=co_login.php");
    exit();
}
mysqli_close($conn)

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #0d6efd;
            color: white;
            min-height: 100vh;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            color: #adb5bd;
            text-decoration: underline;
        }
        .sidebar .active {
            background-color: #084298;
            border-radius: 5px;
        }
        .main-content {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .nav-link {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar p-3">
                <div class="text-center">
                    <i class="fas fa-user-circle fa-5x mb-3"></i>
                    <h2 class="fw-bold">Company Name</h2>
                </div>
                <hr>
                <ul class="nav flex-column fs-6 fw-danger">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" onclick="loadContent('co_dashboardnew')">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" onclick="loadContent('index')">
                            <i class="fas fa-briefcase me-2"></i> Post Job
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" onclick="loadContent('co_profile')">
                            <i class="fas fa-user me-2"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" onclick="loadContent('viewapp')">
                            <i class="fas fa-search me-2"></i> Application Status
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 px-md-4">
                <div class="main-content vh-100 overflow-auto">
                    <?php include "co_dashboardnew.php"; ?>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        function loadContent(page) {
            event.preventDefault();

            const mainContent = document.querySelector('.main-content');
            const id = <?php echo $Id; ?>;
            fetch(`${page}.php?id=${id}`)
                .then(response => response.text())
                .then(data => {
                    mainContent.innerHTML = data;
                })
                .catch(error => {
                    console.error('Error loading content:', error);
                });
        }

        window.addEventListener('load', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const page = urlParams.get('page');
            if (page) {
                loadContent(page);
            }
        });
    </script>
     <script src="script.js"></script>
</body>
</html>
