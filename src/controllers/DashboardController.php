<?php

function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}


function displayBookings($conn) {

    $sql = "SELECT * FROM bookings";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["bookingID"] . "</td>";
            echo "<td>" . $row["customerID"] . "</td>";
            echo "<td>" . $row["roomID"] . "</td>";
            echo "<td>" . $row["checkinDate"] . "</td>";
            echo "<td>" . $row["checkOutDate"] . "</td>";
            echo "<td>" . $row["totalAmount"] . "</td>";
            echo "<td>" . $row["paymentStatus"] . "</td>";
            echo "<td>" . $row["numberOfCustomer"] . "</td>";
            echo "<td>" . $row["message"] . "</td>";
            echo "<td>";
            // You can add any actions (edit, delete, etc.) as needed
            echo "<button>Edit</button>";
            echo "<button>Delete</button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>No results found</td></tr>";
    }
}

function displayCustomers($conn) {
    $sql = "SELECT * FROM customers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["customerID"] . "</td>";
            echo "<td>" . $row["customerFirstName"] . "</td>";
            echo "<td>" . $row["customerLastName"] . "</td>";
            echo "<td>" . $row["customerDob"] . "</td>";
            echo "<td>" . $row["customerEmail"] . "</td>";
            echo "<td>" . $row["customerPhoneNumber"] . "</td>";
            echo "<td>" . $row["customerAddress"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No customers found</td></tr>";
    }
}



function displayRooms($conn) {
    $sql = "SELECT * FROM rooms";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["roomID"] . "</td>";
            echo "<td>" . $row["roomName"] . "</td>";
            echo "<td>" . $row["roomType"] . "</td>";
            echo "<td>" . $row["roomRate"] . "</td>";
            echo "<td>" . $row["roomStatus"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No rooms found</td></tr>";
    }
}

?>