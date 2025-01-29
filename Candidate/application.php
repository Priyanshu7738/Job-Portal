<?php
include "../connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/../phpmailer/src/Exception.php';
require __DIR__ . '/../phpmailer/src/PHPMailer.php';
require __DIR__ . '/../phpmailer/src/SMTP.php';
// require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\Exception.php';
// require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\PHPMailer.php';
// require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\SMTP.php';

if (isset($_GET['candidate_id']) && isset($_GET['task_id']) && is_numeric($_GET['candidate_id']) && is_numeric($_GET['task_id'])) {
    $candidate_id = intval($_GET['candidate_id']);
    $task_id = intval($_GET['task_id']);
} else {
    echo "<script>
        alert('Invalid Candidate ID or Task ID. Redirecting...');
        window.location.href = 'ca_apply.php';
    </script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $candidate_id = intval($_POST['candidate_id']);
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $job_id = intval($_POST['job_id']);
    $cover_letter = mysqli_real_escape_string($conn, $_POST['cover_letter']);
    $linkedin_profile = mysqli_real_escape_string($conn, $_POST['linkedin_profile']);

    $resume = $_FILES['resume']['name'];
    $resume_tmp = $_FILES['resume']['tmp_name'];
    $resume_path = 'uploads/' . $resume;
    move_uploaded_file($resume_tmp, $resume_path);

    $sql = "INSERT INTO applications (full_name, email, job_id, resume, cover_letter, linkedin_profile) 
            VALUES ('$full_name', '$email', '$job_id', '$resume_path', '$cover_letter', '$linkedin_profile')";
    // $sq1="SELECT * FROM CANDIDATE";
    // $result1=mysqli_query($conn, $sql1);
    // $rows1=mysqli_fetch_assoc($result1);
    // $canid=$rows1['id'];

    if (mysqli_query($conn, $sql)) {
        $application_id = mysqli_insert_id($conn);
        echo"<script>
            alert('Application Submitted Successfully')
              window.location.href = 'ca_dashboard.php?id=$candidate_id';
        </script>";
        // echo "Application submitted successfully!";
        // header("location:dashboard.php?id=$canid");


        $jobSql = "SELECT email FROM job_listings WHERE id = $job_id";
        $jobResult = mysqli_query($conn, $jobSql);
        $job = mysqli_fetch_assoc($jobResult);

        if ($job && $job['email']) {
            $companyEmail = $job['email'];
            $emailSent = sendApplicationToCompany($full_name, $email, $job_id, $resume_path, $cover_letter, $linkedin_profile, $companyEmail);

            if ($emailSent) {
                echo "Email has been sent to the company.";
            } else {
                echo "There was an error sending the email.";
            }
        } else {
            echo "No company email found for the selected job.";
        }
    } else {
        echo "Error submitting application: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    echo "Error: Form not submitted correctly.";
}

function sendApplicationToCompany($full_name, $email, $job_id, $resume_path, $cover_letter, $linkedin_profile, $companyEmail) {
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'jobportal1325@gmail.com'; 
        $mail->Password   = 'azau ttyg tybe srhl'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('jobportal1325@gmail.com', 'Job Portal');
        $mail->addAddress($companyEmail); 
        $mail->addReplyTo('jobportal1325@gmail.com', 'Job Portal');

        $mail->isHTML(true);
        $mail->Subject = 'New Job Application';
        $mail->Body    = "
            <p>Dear Hiring Manager,</p>
            <p>A new job application has been submitted by:</p>
            <p><strong>Name:</strong> " . htmlspecialchars($full_name) . "</p>
            <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
            <p><strong>Job Applied:</strong> " . htmlspecialchars($job_id) . "</p>
            <p><strong>Cover Letter:</strong> " . nl2br(htmlspecialchars($cover_letter)) . "</p>
            <p><strong>LinkedIn Profile:</strong> " . htmlspecialchars($linkedin_profile) . "</p>
            <p><strong>Resume:</strong> <a href='" . htmlspecialchars($resume_path) . "'>Download</a></p>
        ";

        return $mail->send();
    } catch (Exception $e) {
        echo "Error sending email: {$mail->ErrorInfo}";
        return false;
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
                        <form action="application.php?candidate_id=<?php echo $candidate_id; ?>&task_id=<?php echo $task_id; ?>" method="POST" enctype="multipart/form-data" id="job-application-form">
                        <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
                        <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
                            <div class="form-group mb-3">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" required placeholder="Enter your full name">
                            </div>

                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email address">
                            </div>
                            <div class="form-group mb-3">
                            <label for="job_id" class="form-label">Select Job</label>
                            <select class="form-control" id="job_id" name="job_id" required>
                            <option value="" disabled selected>-- Select Job --</option>
                            <?php            
                            $conn = new mysqli('localhost', 'root', '', 'jobportal');
                             if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }
                            $result = $conn->query("SELECT id, job_title FROM job_listings");
                             while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['job_title']) . "</option>";
                            }
                          $conn->close();
                            ?>
                            </select>
                            </div>



                            <div class="form-group mb-3">
                                <label for="resume" class="form-label">Resume (Max: 5MB)</label>
                                <input type="file" class="form-control" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
                                <small class="form-text text-muted">Allowed formats: .pdf, .doc, .docx</small>
                            </div>

                            <div class="form-group mb-3">
                                <label for="cover_letter" class="form-label">Cover Letter</label>
                                <textarea class="form-control" id="cover_letter" name="cover_letter" rows="4" placeholder="Write your cover letter here"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="linkedin_profile" class="form-label">LinkedIn Profile (Optional)</label>
                                <input type="url" class="form-control" id="linkedin_profile" name="linkedin_profile" placeholder="Enter your LinkedIn profile URL">
                            </div>

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
