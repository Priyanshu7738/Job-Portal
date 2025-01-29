<?php
include "../connection.php";
include 'sendmail.php'; 


// if (!isset($_GET['id'])) {
//     die("Error: Missing 'id' parameter.");
// }

$Id = intval($_GET['id']);

$sql = "SELECT * FROM applications WHERE id=$Id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error fetching application details: " . mysqli_error($conn));
}

$rows = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    $newStatus = mysqli_real_escape_string($conn, $_POST['status']);

    $updateSql = "UPDATE applications SET status='$newStatus' WHERE id=$Id";
    if (mysqli_query($conn, $updateSql)) {
        echo "Status updated successfully!";

        $email = $rows['email'];
        $full_name = $rows['full_name'];

        $emailSent = sendStatusUpdateEmail($email, $full_name, $newStatus);

        if ($emailSent) {
            echo ' Email has been sent to the candidate.';
        } else {
            echo ' There was an error sending the email.';
        }
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}

?>


<!doctype html>
<html lang="en">
    <head>
        <title>Job Application</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS v5.3.2 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <style>
            body {
                background-color: #f4f6f9;
                font-family: Arial, sans-serif;
            }
            .card {
                background: white;
                border-radius: 10px;
                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            }
            .card-header {
                background: #007bff;
                color: white;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                text-align: center;
                padding: 15px;
            }
            .form-control {
                border-radius: 5px;
            }
            button {
                border-radius: 5px;
                background-color: #007bff;
                color: white;
                padding: 10px 20px;
                border: none;
            }
            button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div class="container my-5 p-5" style="max-width: 700px;">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Job Application</h3>
                    </div>
                    <div class="card-body">
                        <form action="statusedit.php?id=<?php echo"{$rows['id']}"; ?>" method="POST" enctype="multipart/form-data" id="job-application-form">
                            <!-- Full Name Field -->
                            <div class="form-group mb-3">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" required placeholder="Enter your full name" value="<?php echo"{$rows['full_name']}"?>" readonly>
                            </div>

                            <!-- Email Field -->
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email address" value="<?php echo"{$rows['email']}"?>" readonly>
                            </div>

                            <!-- Job Selection Dropdown -->
                            <div class="form-group mb-3">
                                <label for="job_id" class="form-label">Select Job</label>
                                <!-- <select class="form-control" id="job_id" name="job_id" required> -->
                                <?php
                                    $conn = new mysqli('localhost', 'root', '', 'jobportal');
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    $result = $conn->query("SELECT id, job_title FROM job_listings");

                                    
                                    while ($row = $result->fetch_assoc()) {
                                        // Adding the job ID dynamically to each option
                                        echo "<input type='text' value='" . $row['job_title'] . " '></input>";
                                    }
                                    

                                    $conn->close();
                                ?>


                                <!-- </select> -->
                            </div>

                            <!-- Resume Upload Field -->
                            <div class="form-group mb-3">
                                <label for="resume" class="form-label">Resume (Max: 5MB)</label>
                                <input type="text" class="form-control" id="resume" name="resume" accept=".pdf,.doc,.docx" value="<?php echo"{$rows['resume']}"?>" readonly>
                                <small class="form-text text-muted">Allowed formats: .pdf, .doc, .docx</small>
                            </div>

                            <!-- Cover Letter Field -->
                            <div class="form-group mb-3">
                                <label for="cover_letter" class="form-label">Cover Letter</label>
                                <textarea class="form-control" id="cover_letter" name="cover_letter" rows="4" placeholder="Write your cover letter here"></textarea>
                            </div>

                            <!-- LinkedIn Profile Field -->
                            <div class="form-group mb-3">
                                <label for="linkedin_profile" class="form-label">LinkedIn Profile (Optional)</label>
                                <input type="text" class="form-control" id="linkedin_profile" name="linkedin_profile" placeholder="Enter your LinkedIn profile URL" value="<?php echo"{$rows['linkedin_profile']}"?>" readonly>
                            </div>
                            <div class="mb-4">
                            <label for="" class="form-label">Status</label>
                            <select
                                class="form-select form-select-sm"
                                name="status"
                                id="">
                                <option value="Recieved" <?php echo $rows['status'] == 'Recieved' ? 'selected' : ''; ?>>Recieved</option>
                                <option value="Reviewed" <?php echo $rows['status'] == 'Reviewed' ? 'selected' : ''; ?>>Reviewed</option>
                                <option value="Interview Scheduled" <?php echo $rows['status'] == 'Interview Scheduled' ? 'selected' : ''; ?>>Interview Scheduled</option>

                            </select>
                        </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Apply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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