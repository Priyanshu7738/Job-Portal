<?php
session_start();

include "../connection.php";

$Email = $_POST['email'] ?? null;
$Password = $_POST['password'] ?? null;

if ($Email && $Password) {
    $sql = "SELECT * FROM COMPANY WHERE Email = '$Email' AND Password = '$Password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $company = mysqli_fetch_assoc($result);
        $companyId = $company['Id'];
        header("location:co_dashboard.php?id=$companyId");
        exit();
    } else {
        echo "<script>
            alert('Invalid Credentials');
            window.location.href = 'co_login.php';
        </script>";
        exit();
    }
} else {
    echo "<script>
        alert('Email and Password are required');
        window.location.href = 'co_login.php';
    </script>";
    exit();
}

mysqli_close($conn);
?>