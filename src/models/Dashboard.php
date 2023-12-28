<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$result = $conn->query("SELECT COUNT(*) AS totalBookings, SUM(totalAmount) AS totalAmount FROM bookings");

// Fetch the result as an associative array
$data = $result->fetch_assoc();

echo json_encode($data);

// Close connection
$conn->close();
?>
