<?php
include "../connection.php";

$search_title = $_GET['search_title'] ?? '';
$search_location = $_GET['search_location'] ?? '';
$search_type = $_GET['search_type'] ?? '';
$remote = isset($_GET['remote']) ? 1 : 0;
$freelance = isset($_GET['freelance']) ? 1 : 0;

$Id = $_GET['id'] ?? 0;

if (!$Id || !is_numeric($Id)) {
    echo "<h3>Invalid or missing candidate ID.</h3>";
    exit();
}

$sql = "SELECT * FROM job_listings WHERE 
        job_title LIKE '%$search_title%' 
        AND location LIKE '%$search_location%' 
        AND job_type LIKE '%$search_type%'";

if ($remote) {
    $sql .= " AND is_remote = 1";
}

if ($freelance) {
    $sql .= " AND is_freelance = 1";
}

$result = $conn->query($sql);

if (isset($_GET['ajax']) && $_GET['ajax'] == 1) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card mb-3'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . htmlspecialchars($row['job_title']) . "</h5>&nbsp
                        <p class='card-text'>Company: " . htmlspecialchars($row['company_name']) . "</p>
                        <p class='card-text'>Location: " . htmlspecialchars($row['location']) . "</p>
                        <p class='card-text'>Job Type: " . htmlspecialchars($row['job_type']) . "</p>
                    </div>
                  </div>";
        }
    } else {
        echo "<p class='text-warning'>No results found for your search.</p>";
    }
    exit();
}
?>
<div class="card container-fluid">
    <div class="card-header">
        <h4 class="card-title">Search Jobs</h4>
    </div>
    <div class="card-body">
        <form id="search-form">
            <input type="hidden" name="id" value="<?php echo $Id; ?>">
            <div class="form-group">
                <label for="search_title">Job Title</label>
                <input type="text" class="form-control" id="search_title" name="search_title">
            </div>
            <div class="form-group">
                <label for="search_location">Location</label>
                <input type="text" class="form-control" id="search_location" name="search_location">
            </div>
            <div class="form-group">
                <label for="search_type">Job Type</label>
                <select class="form-control" id="search_type" name="search_type">
                    <option value="">All</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Contract">Contract</option>
                </select>
            </div>
            <br>
           <center> <button type="submit" class="btn btn-primary">Search</button></center>
        </form>
    </div>
</div>
<div id="search-results" class="mt-4"></div>
