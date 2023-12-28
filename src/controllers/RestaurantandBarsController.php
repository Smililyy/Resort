<?php
include "./inc/essentials.php";
require '../models/RestaurantandBars.php';

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

    if (mysqli_query($conn, $sql)) {
        // Insert successful, now you can send confirmation email
        sendConfirmationEmail($name, $email);

        // Redirect or display success message as needed
        header("Location: success_page.php"); // Redirect to a success page
        exit();
    } else {
        // Insert failed, handle the error
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
