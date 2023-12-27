<?php
require '../../vendor/PHPMailer/src/Exception.php';
require '../../vendor/PHPMailer/src/SMTP.php';
require '../../vendor/PHPMailer/src/PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MeetingeventModel {
    private $con;
    private $db_server = 'localhost';
    private $db_username = 'root';
    private $db_password = '';
    private $db_name = 'hotel';
    
    public function __construct() {
        // Initialize the database connection
        $this->con = new mysqli($this->db_server, $this->db_username, $this->db_password, $this->db_name);

        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }


    public function checkCustomer($phone) {
        // Check if the customer already exists
        $existingCustomer = null;
        $sqlCheckCustomer = "SELECT customerID FROM customers WHERE customerPhoneNumber = '".$phone."'";
        $resultCheckCustomer = mysqli_query($this->con, $sqlCheckCustomer);

        if ($resultCheckCustomer) {
            $row = mysqli_fetch_assoc($resultCheckCustomer);
            if ($row) {
                $existingCustomer = $row['customerID'];
            }
        }

        return $existingCustomer;
    }

    public function addNewCustomer($fname, $lname, $phone, $email) {
        // If the customer does not exist, add a new one
        $existingCustomer = null;
        $sqlInsertCustomer = "INSERT INTO customers (customerFirstName, customerLastName, customerPhoneNumber, customerEmail) 
                            VALUES ('".$fname."','".$lname."','".$phone."','".$email."')";
        
        $resultInsertCustomer = mysqli_query($this->con, $sqlInsertCustomer);

        if (!$resultInsertCustomer) {
            echo "Error inserting customer: " . mysqli_error($this->con);
            // Handle errors when adding new customers
        } else {
            $existingCustomer = mysqli_insert_id($this->con); // Get the ID of the newly added customer
        }

        return $existingCustomer;
    }

    public function selectBookableRoom($roomname) {
        // Randomly select a bookable room
        $roomchoosen = null;
        $sqlSelectRoom = "SELECT roomID FROM rooms 
                        WHERE roomName = '".$roomname."' AND roomStatus = 'Available' 
                        ORDER BY RAND() LIMIT 1";

        $resultSelectRoom = mysqli_query($this->con, $sqlSelectRoom);

        if ($resultSelectRoom) {
            $row = mysqli_fetch_assoc($resultSelectRoom);
            if ($row) {
                $roomchoosen = $row['roomID'];
            }
        }

        return $roomchoosen;
    }

    public function processMeetingEvent($existingCustomer, $roomchoosen, $eventdate, $roomname, $numberofguest, $message, $email, $fname, $lname) {
        // Select room rate
        $sqlGetRoomRate = "SELECT roomRate FROM rooms WHERE roomName = '".$roomname."'";
        $resultGetRoomRate = mysqli_query($this->con, $sqlGetRoomRate);

        if ($resultGetRoomRate) {
            $row = mysqli_fetch_assoc($resultGetRoomRate);
            $room_rate = $row['roomRate'];

            // insert booking
            $sqlInsertBooking = "INSERT INTO bookings (customerID, roomID, checkinDate, totalAmount, paymentStatus, numberOfCustomer, message) 
                                VALUES ('".$existingCustomer."','".$roomchoosen."','".$eventdate."','".$room_rate."','Unpaid','".$numberofguest."','".$message."')";

            $resultInsertBooking = mysqli_query($this->con, $sqlInsertBooking);

            if ($resultInsertBooking) {
                // Reupdate room status to Reserved
                $sqlUpdateRoomStatus = "UPDATE rooms SET roomStatus = 'Reserved' WHERE roomID = '".$roomchoosen."'";
                $resultUpdateRoomStatus = mysqli_query($this->con, $sqlUpdateRoomStatus);

                if (!$resultUpdateRoomStatus) {
                    echo "Error updating room status: " . mysqli_error($this->con);
                    // Handle error update room status
                }
            } else {
                echo "Error inserting booking: " . mysqli_error($this->con);
                // Handle error insert new booking
            }
        } else {
            echo "Error getting room rate: " . mysqli_error($this->con);
            // Handle error get room rate
        }

        // Send email confirmation
        $this->sendEmailConfirmation($email, $fname, $lname, $existingCustomer, $eventdate, $roomname, $numberofguest);

    }

    public function sendEmailConfirmation($email, $fname, $lname, $existingCustomer, $eventdate, $roomname, $numberofguest) {
        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'santelacuisine@gmail.com';               // SMTP username
            $mail->Password   = 'ifdknnejliqzbzqj';                    // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           // Enable implicit TLS encryption
            $mail->Port       = 465;                                   // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
            // Recipients
            $mail->setFrom('tuthihue.qn@gmail.com','SaiGon Hotel');
            $mail->addAddress($email, $fname);     // Add a recipient

            // Content
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Meeting Event Confirmation - SaiGonHotel';

            // Email body
            $mail->Body = "
                <p>Dear $fname $lname,</p>
                <p>Thank you for choosing SaiGonHotel! Your meeting event has been confirmed.</p>
                
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
            $mail->AltBody = 'Thank you for choosing SaiGonHotel! Your meeting event has been confirmed.';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function closeConnection() {
        // Close the database connection
        $this->con->close();
    }
}
?>
