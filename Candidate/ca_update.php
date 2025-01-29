<?php
include "../connection.php";

$Id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$Name = isset($_POST['name']) ? $_POST['name'] : '';
$DOB = isset($_POST['dob']) ? $_POST['dob'] : '';
$Email = isset($_POST['email']) ? $_POST['email'] : '';
$Phoneno = isset($_POST['phone']) ? $_POST['phone'] : '';
$Address = isset($_POST['address']) ? $_POST['address'] : '';
$Education = isset($_POST['education']) ? $_POST['education'] : '';
$Marks = isset($_POST['marks']) ? $_POST['marks'] : '';
$Experience = isset($_POST['Experience']) ? $_POST['Experience'] : '';  
$Skill = isset($_POST['skill']) ? $_POST['skill'] : '';
$Linkedin = isset($_POST['linkedin']) ? $_POST['linkedin'] : '';
$Protfolio = isset($_POST['protfolio']) ? $_POST['protfolio'] : '';
$Password = isset($_POST['password']) ? $_POST['password'] : '';

$sql = "UPDATE CANDIDATE SET `Name`='$Name', `DOB`='$DOB', `Email`='$Email', `Phone No`='$Phoneno', `Address`='$Address', `Education`='$Education', `Marks`='$Marks', `Experience`='$Experience', `Skill`='$Skill', `Linkedin`='$Linkedin', `Protfolio`='$Protfolio', `Password`='$Password' WHERE id=$Id";

if (mysqli_query($conn, $sql)) {
    header("Location:ca_dashboard.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>