<?php

include "../connection.php";

$CompanyName = $_POST['comname'];
$Email = $_POST['email'];
$BussinessType = $_POST['busstype'];
$BussinessActivity = $_POST['activity'];
$Address = $_POST['address'];
$Owner = $_POST['owner'];
$Password = $_POST['password'];

$sql="INSERT INTO COMPANY(`company name`,`email`, `bussiness type`, `bussiness activity`, `address`, `owner`, `password`)VALUES('$CompanyName','$Email', '$BussinessType', '$BussinessActivity', '$Address', '$Owner', '$Password')";

if(mysqli_query($conn, $sql)){
    header("location:co_login.php");
}else{
    echo mysqli_error($conn);
}

mysqli_close($conn);



?>