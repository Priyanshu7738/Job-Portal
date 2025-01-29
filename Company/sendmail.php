<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../phpmailer/src/Exception.php';
require __DIR__ . '/../phpmailer/src/PHPMailer.php';
require __DIR__ . '/../phpmailer/src/SMTP.php';

// require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\Exception.php';
// require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\PHPMailer.php';
// require 'C:\Xampp\htdocs\jobportal\PHPMailer\src\SMTP.php';

if (isset($_GET['id']) && isset($_POST['status'])) {
    include "../connection.php";
    
    $Id = intval($_GET['id']);
    $newStatus = mysqli_real_escape_string($conn, $_POST['status']);

    $sql = "SELECT * FROM applications WHERE id=$Id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $candidate = mysqli_fetch_assoc($result);

        if ($candidate) {
            $updateSql = "UPDATE applications SET status='$newStatus' WHERE id=$Id";
            if (mysqli_query($conn, $updateSql)) {
                echo "Status updated successfully!";
            } else {
                echo "Error updating status: " . mysqli_error($conn);
            }

            function sendStatusUpdateEmail($email, $full_name, $newStatus) {
                try {
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'jobportal1325@gmail.com'; // Replace with your email
                    $mail->Password   = 'azau ttyg tybe srhl'; // Replace with your app password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;
            
                    $mail->setFrom('jobportal1325@gmail.com', 'Job Portal');
                    $mail->addAddress($email, $full_name);
                    $mail->addReplyTo('jobportal1325@gmail.com', 'Job Portal');
            
                    $mail->isHTML(true);
                    $mail->Subject = 'Job Application Status Update';
                    $mail->Body    = "
                        <p>Dear " . htmlspecialchars($full_name) . ",</p>
                        <p>Your job application status has been updated to <strong>" . htmlspecialchars($newStatus) . "</strong>.</p>";
            
                    if ($newStatus == 'Interview Scheduled') {
                        $mail->Body .= "
                            <p>
                            Dear Candidate,<br>
                            Thank you for your application to JobPortal. We are pleased to inform you that your interview has been scheduled for [13/01/2025] at [12:30 PM]. The interview will take place [Mumbai]. 
                            If you have any questions or need to reschedule, please feel free to contact us at [jobportal1325@gmail.com].<br>
                            We look forward to discussing how your skills and experiences align with the opportunities at JobPortal.<br><br>
                            Best regards,<br>
                            Job Portal Team<br>
                            HR Team<br>
                            JobPortal
                            </p>";
                    }
            
                    $mail->AltBody = 'Your job application status has been updated to ' . htmlspecialchars($newStatus) . '.';
            
                    $mail->send();
                    return true; // Email sent successfully
                } catch (Exception $e) {
                    error_log("Error sending email: {$mail->ErrorInfo}");
                    return false; // Email failed to send
                }
            }
        }
    }
}
// } else {
//     echo "Error: Missing 'id' or 'status' parameter.";
// }
?>
