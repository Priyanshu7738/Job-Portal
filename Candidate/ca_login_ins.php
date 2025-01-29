<?php
session_start();

include "../connection.php";

$Email = $_POST['email'] ?? null;
$Password = $_POST['password'] ?? null;

if ($Email && $Password) {
    $sql = "SELECT * FROM `CANDIDATE` WHERE `Email` = '$Email' AND `Password` = '$Password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $candidate = mysqli_fetch_assoc($result);
        $candidateId = $candidate['Id'];
        header("location:ca_dashboard.php?id=$candidateId");
        exit();
    } else {
        echo "Invalid credentials. <a href='index.html'>Try Again</a>";
    }
} else {
    echo "Email and Password are required. <a href='index.html'>Try Again</a>";
}
mysqli_close($conn);
?>
