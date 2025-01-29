<?php
include "../connection.php";

$Id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$CompanyName = isset($_POST['company_name']) ? $_POST['company_name'] : '';
$Email = isset($_POST['email']) ? $_POST['email'] : '';
$BusinessType = isset($_POST['business_type']) ? $_POST['business_type'] : '';
$BusinessActivity = isset($_POST['business_activity']) ? $_POST['business_activity'] : '';
$Address = isset($_POST['address']) ? $_POST['address'] : '';
$Owner = isset($_POST['owner']) ? $_POST['owner'] : '';
$Password = isset($_POST['password']) ? $_POST['password'] : '';

$sql = "UPDATE company SET `Company Name`='$CompanyName', `Email`='$Email', `Bussiness Type`='$BussinessType', `Bussiness Activity`='$BussinessActivity', `Address`='$Address', `Owner`='$Owner', `Password`='$Password' WHERE id=$Id";

if (mysqli_query($conn, $sql)) {
    header("Location:co_dashboard.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
