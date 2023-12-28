<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$result = $conn->query("SELECT MONTH(checkinDate) AS month, COUNT(*) AS totalBookings FROM bookings GROUP BY month");

// Format data as needed (e.g., convert to JSON)
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

// Close connection
$conn->close();
?>
