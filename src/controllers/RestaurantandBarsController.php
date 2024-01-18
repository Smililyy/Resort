<?php

require __DIR__ . "/../inc/Database.php";
require __DIR__ . "/./inc/essentials.php";
require __DIR__ . "/../models/Booking.php";
$db = new Database();
$db->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $reservationDate = $_POST["reservationDate"];
    $selectTime = $_POST["selectTime"];
    $partySize = $_POST["SelectpartySize"];
    $email = $_POST["email"];

    // $conn is the existing database connection from RestaurantandBars.php

    // Perform database operations - Insert into bookings table
    $sql = "INSERT INTO bookings (customerID, checkinDate, numberOfCustomer, message)
            VALUES (1, '$reservationDate', $partySize, 'Reservation')";
    $resultInserBooking = $this->db->queryNoStmt($sql);
    if ($resultInserBooking) {
        // Insert successful, now you can send confirmation email
        // sendConfirmationEmail($name, $email);

        // Redirect or display success message as needed
        header("Location: success_page.php"); // Redirect to a success page
        exit();
    } else {
        // Insert failed, handle the error
        echo "Error: " . $sql . "<br>" .  $this->db->getError();
    }
}
$db->close();
