<?php
require __DIR__ . "/../inc/Database.php";
require __DIR__ . "/./inc/essentials.php";
require __DIR__ . "/../models/Booking.php";
$db = new Database();
$db->connect();
class MeetingeventController
{
    public function processMeetingEvent($postData)
    {
        $fname = $postData['firstname'];
        $lname = $postData['lastname'];
        $phone = $postData['phone'];
        $email = $postData['email'];
        $eventdate = $postData['eventdate'];
        $numberofday = $postData['numberofday'];
        $roomname = $postData['nameroom'];
        $numberofguest = $postData['numberofguest'];
        $message = $postData['message'];

        // Create an instance of the model
        $meetingeventModel = new Booking();

        // Check if the customer already exists
        $existingCustomer = $meetingeventModel->checkCustomer($phone);

        // If the customer does not exist, add a new one
        if ($existingCustomer === null) {
            $existingCustomer = $meetingeventModel->addNewCustomer($fname, $lname, $phone, $email);
        }

        // Randomly select a bookable room
        $roomchoosen = $meetingeventModel->selectBookableRoom($roomname);

        // If there is a room that can be booked, add a booking
        if ($roomchoosen !== null) {
            $meetingeventModel->processMeetingEvent($existingCustomer, $roomchoosen, $eventdate, $roomname, $numberofguest, $message, $email, $fname, $lname);
        }

        // Close the database connection
        $meetingeventModel->closeConnection();

        // Redirect to the confirmation page
        header('Location: http://localhost/hotel/src/views/Meetingevent.php');
    }
}

// Usage: Instantiate the controller and call the processMeetingEvent method
$meetingeventController = new MeetingeventController();
$meetingeventController->processMeetingEvent($_POST);
$db->close();
