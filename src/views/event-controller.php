<?php
include "connect.php";

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$eventdate = $_POST['eventdate'];
$numberofday = $_POST['numberofday'];
$roomname = $_POST['nameroom'];
$numberofguest = $_POST['numberofguest'];
$message = $_POST['message'];

// Check if the customer already exists
$existingCustomer = null;
$sqlCheckCustomer = "SELECT customerID FROM customers WHERE customerPhoneNumber = '".$phone."'";
$resultCheckCustomer = mysqli_query($conn, $sqlCheckCustomer);

if ($resultCheckCustomer) {
    $row = mysqli_fetch_assoc($resultCheckCustomer);
    if ($row) {
        $existingCustomer = $row['customerID'];
    }
}

// If the customer does not exist, add a new one
if ($existingCustomer === null) {
    $sqlInsertCustomer = "INSERT INTO customers (customerFirstName, customerLastName, customerPhoneNumber, customerEmail) 
                         VALUES ('".$fname."','".$lname."','".$phone."','".$email."')";
    
    $resultInsertCustomer = mysqli_query($conn, $sqlInsertCustomer);

    if (!$resultInsertCustomer) {
        echo "Error inserting customer: " . mysqli_error($conn);
        // Handle errors when adding new customers
    } else {
        $existingCustomer = mysqli_insert_id($conn); // Get the ID of the newly added customer
    }
}

// Randomly select a bookable room
$roomchoosen = null;
$sqlSelectRoom = "SELECT roomID FROM rooms 
                WHERE roomName = '".$roomname."' AND roomStatus = 'Available' 
                ORDER BY RAND() LIMIT 1";

$resultSelectRoom = mysqli_query($conn, $sqlSelectRoom);

if ($resultSelectRoom) {
    $row = mysqli_fetch_assoc($resultSelectRoom);
    if ($row) {
        $roomchoosen = $row['roomID'];
    }
}

// If there is a room that can be booked, add a booking
if ($roomchoosen !== null) {
    // Select room rate
    $sqlGetRoomRate = "SELECT roomRate FROM rooms WHERE roomName = '".$roomname."'";
    $resultGetRoomRate = mysqli_query($conn, $sqlGetRoomRate);

    if ($resultGetRoomRate) {
        $row = mysqli_fetch_assoc($resultGetRoomRate);
        $room_rate = $row['roomRate'];

        // insert booking
        $sqlInsertBooking = "INSERT INTO bookings (customerID, roomID, checkinDate, totalAmount, paymentStatus, numberOfCustomer, message) 
                            VALUES ('".$existingCustomer."','".$roomchoosen."','".$eventdate."','".$room_rate."','Unpaid','".$numberofguest."','".$message."')";

        $resultInsertBooking = mysqli_query($conn, $sqlInsertBooking);

        if ($resultInsertBooking) {
            // Reupdate room status to Reserved
            $sqlUpdateRoomStatus = "UPDATE rooms SET roomStatus = 'Reserved' WHERE roomID = '".$roomchoosen."'";
            $resultUpdateRoomStatus = mysqli_query($conn, $sqlUpdateRoomStatus);

            if (!$resultUpdateRoomStatus) {
                echo "Error updating room status: " . mysqli_error($conn);
                // Handle error update room status
            }
        } else {
            echo "Error inserting booking: " . mysqli_error($conn);
            // Handle error insert new booking
        }
    } else {
        echo "Error getting room rate: " . mysqli_error($conn);
        // Handle error get room rate
    }
}


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/SMTP.php';
require '../vendor/PHPMailer/src/PHPMailer.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tuthihue.qn@gmail.com';                     //SMTP username
    $mail->Password   = 'hvwmcyxwrzxtsquh';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('tuthihue.qn@gmail.com','SaiGon Hotel');
    $mail->addAddress($email, $fname);     //Add a recipient
  

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Booking Confirmation - SaiGonHotel';

    // Email body
    $mail->Body = "
        <p>Dear $fname $lname,</p>
        <p>Thank you for choosing SaiGonHotel! Your booking has been confirmed.</p>
        
        <h2>Booking Details:</h2>
        <p><strong>Customer ID:</strong> $existingCustomer</p>
        <p><strong>Event Date:</strong> $eventdate</p>
        <p><strong>Room Type:</strong> Event and Meeting</p>
        <p><strong>Number of guests:</strong> $numberofguest</p>
        <p><strong>Category of room:</strong> $roomname</p>
        

        <p>We look forward to welcoming you at SaiGonHotel. If you have any questions or need further assistance, feel free to contact us.</p>

        <p>Best regards,<br>SaiGonHotel Team</p>
    ";

    // Plain text version for non-HTML mail clients
    $mail->AltBody = 'Thank you for choosing SaiGonHotel! Your booking has been confirmed.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
  header('Location: meetings-events.php');
  $conn->close();

?>
