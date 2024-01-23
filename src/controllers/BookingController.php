<?php
include "../models/Booking.php";
require __DIR__ . "/../models/Booking.php";
require __DIR__ . "/./inc/essentials.php";
require __DIR__ . "/../inc/Database.php";
// $db = new Database();
// $db->connect();
class BookingController
{

    public function processBooking($postData)
    {
        $fname = $postData['firstname'];
        $lname = $postData['lastname'];
        $phone = $postData['phone'];
        $email = $postData['email'];
        //$checkindate = $postData['eventdate'];
        //$checkoutdate = $postData['numberofday'];
        //$numberofguest = $postData['numberofguest'];
        //$message = $postData['message'];

        // Create an instance of the model
        $bookingModel = new Booking;

        // Check if the customer already exists
        $existingCustomer = $bookingModel->checkCustomer($phone);

        // If the customer does not exist, add a new one
        if ($existingCustomer === null) {
            $existingCustomer = $bookingModel->addNewCustomer($fname, $lname, $phone, $email);
        }

        // Close the database connection
        $bookingModel->closeConnection();

        // Redirect to the confirmation page
        header('Location: http://localhost/hotel/src/views/Booking.php');
    }
}

// Usage: Instantiate the controller and call the processMeetingEvent method
$meetingeventController = new BookingController();
$meetingeventController->processBooking($_POST);
// $db->close();
