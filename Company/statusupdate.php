<?php

include "../connection.php";

$id=$_GET['id'];


$status=$_POST['status'];

$sql="UPDATE `applications` SET `status`='$status' where `applications`.`id`=$id";

if(mysqli_query($conn, $sql)){
    header("location:sendmail.php");
}
else{
    echo mysqli_error($conn);
}

mysqli_close($conn);

?>