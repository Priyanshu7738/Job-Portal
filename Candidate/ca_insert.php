<?php

include "../connection.php";

$Name = $_POST['name'];
$DOB = $_POST['dob'];
$Email = $_POST['email'];
$Phoneno = $_POST['phone'];
$Address = $_POST['address'];
$Education = $_POST['education'];
$Marks = $_POST['marks'];
$Experince = $_POST['workexp'];
$Skill = $_POST['skill'];
$Linkedin = $_POST['linkedin'];
$Protfolio = $_POST['protfolio'];
$Password = $_POST['password'];

$sql="INSERT INTO `candidate` (`Name`, `DOB`, `Email`, `Phone no`, `Address`, `Education`, `Marks`, `Experience`, `Skill`, `Linkedin`, `Protfolio`, `Password`) VALUES ('$Name', '$DOB', '$Email', '$Phoneno', '$Address', '$Education', '$Marks', '$Experince', '$Skill', '$Linkedin', '$Protfolio', '$Password');";

if(mysqli_query($conn, $sql)){
    header("location:ca_login.php");
}else{
    echo mysqli_error($conn);
}

mysqli_close($conn);



?>