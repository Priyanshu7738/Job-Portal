<?php

$search_title = $_GET['search_title'] ?? '';
$search_location = $_GET['search_location'] ?? '';
$search_type = $_GET['search_type'] ?? '';

$conn = new mysqli('localhost', 'root', '', 'jobportal');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM job_listings WHERE job_title LIKE '%$search_title%' AND location LIKE '%$search_location%' AND job_type LIKE '%$search_type%'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<div><h3>" . $row['job_title'] . "</h3><p>" . $row['company_name'] . "</p><p>" . $row['location'] . "</p></div>";
}

$conn->close();
?>
