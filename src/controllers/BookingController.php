<?php
//include "./inc/db_config.php";
include "./inc/essentials.php";
include "../models/Booking.php"; 

class BookingController {
    public function processBooking($postData) {
        $fname = $postData['firstname'];
        $lname = $postData['lastname'];
        $phone = $postData['phone'];
        $email = $postData['email'];
        //$checkindate = $postData['eventdate'];
        //$checkoutdate = $postData['numberofday'];
        //$numberofguest = $postData['numberofguest'];
        //$message = $postData['message'];

        // Create an instance of the model
        $meetingeventModel = new MeetingeventModel();

        // Check if the customer already exists
        $existingCustomer = $meetingeventModel->checkCustomer($phone);

        // If the customer does not exist, add a new one
        if ($existingCustomer === null) {
            $existingCustomer = $meetingeventModel->addNewCustomer($fname, $lname, $phone, $email);
        }

        // Close the database connection
        $meetingeventModel->closeConnection();

        // Redirect to the confirmation page
        header('Location: http://localhost/hotel/src/views/Booking.php');
    }
}

// Usage: Instantiate the controller and call the processMeetingEvent method
$meetingeventController = new BookingController();
$meetingeventController->processBookingEvent($_POST);
mysqli_close($con);

?>