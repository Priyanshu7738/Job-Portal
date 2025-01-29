<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('localhost', 'root', '', 'jobportal');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $cover_letter = $_POST['cover_letter'] ?? '';
    $linkedin_profile = $_POST['linkedin_profile'] ?? '';
    $job_id = $_POST['job_id'];

    if (empty($job_id) || empty($full_name) || empty($email)) {
        die("Error: Please fill in all required fields, including job selection.");
    }

    $resume = $_FILES['resume'];
    $target_dir = "uploads/resumes/";
    $target_file = $target_dir . basename($resume["name"]);
    if (!move_uploaded_file($resume["tmp_name"], $target_file)) {
        die("Error: Failed to upload resume.");
    }

    $sql = "INSERT INTO applications (job_id, full_name, email, cover_letter, linkedin_profile, resume) 
            VALUES ('$job_id', '$full_name', '$email', '$cover_letter', '$linkedin_profile', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        echo "Application submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
