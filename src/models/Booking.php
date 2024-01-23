<?php
require '../../vendor/PHPMailer/src/Exception.php';
require '../../vendor/PHPMailer/src/SMTP.php';
require '../../vendor/PHPMailer/src/PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Booking
{
    private $db;

    public function __construct()
    {
        // Initialize the database connection
        $this->db = new Database();
        $this->db->connect();
    }
    function sendConfirmationEmail($customerName, $customerEmail)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'tuthihue.qn@gmail.com';               // SMTP username
            $mail->Password   = 'hvwmcyxwrzxtsquh';                    // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           // Enable implicit TLS encryption
            $mail->Port       = 465;                                   // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


            //Recipients
            $mail->setFrom('tuthihue.qn@gmail.com', 'SaiGon Hotel');
            $mail->addAddress($customerEmail, $customerName);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Reservation Confirmation';
            $mail->Body    = 'Dear ' . $customerName . ',<br>Your reservation has been confirmed. Thank you for choosing us!';

            $mail->send();
            echo 'Email has been sent successfully';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function sendEmailConfirmation($email, $fname, $lname, $existingCustomer, $eventdate, $roomname, $numberofguest)
    {
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
            $mail->setFrom('tuthihue.qn@gmail.com', 'SaiGon Hotel');
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

    public function checkCustomer($phone)
    {
        // Check if the customer already exists
        $existingCustomer = null;
        $sqlCheckCustomer = "SELECT customerID FROM customers WHERE customerPhoneNumber = '" . $phone . "'";
        $resultCheckCustomer = $this->db->queryNoStmt($sqlCheckCustomer);

        if ($resultCheckCustomer) {
            $row = mysqli_fetch_assoc($resultCheckCustomer);
            if ($row) {
                $existingCustomer = $row['customerID'];
            }
        }

        return $existingCustomer;
    }

    public function addNewCustomer($fname, $lname, $phone, $email)
    {
        // If the customer does not exist, add a new one
        $existingCustomer = null;
        $sqlInsertCustomer = "INSERT INTO customers (customerFirstName, customerLastName, customerPhoneNumber, customerEmail) 
                            VALUES ('" . $fname . "','" . $lname . "','" . $phone . "','" . $email . "')";

        $resultInsertCustomer = $this->db->queryNoStmt($sqlInsertCustomer);

        if (!$resultInsertCustomer) {
            echo "Error inserting customer: " . $this->db->getError();
            // Handle errors when adding new customers
        } else {
            $existingCustomer =  $this->db->getInsertId(); // Get the ID of the newly added customer
        }

        return $existingCustomer;
    }

    public function selectBookableRoom($roomname)
    {
        // Randomly select a bookable room
        $roomchoosen = null;
        $sqlSelectRoom = "SELECT roomID FROM rooms 
                        WHERE roomName = '" . $roomname . "' AND roomStatus = 'Available' 
                        ORDER BY RAND() LIMIT 1";

        $resultSelectRoom = $this->db->queryNoStmt($sqlSelectRoom);

        if ($resultSelectRoom) {
            $row = mysqli_fetch_assoc($resultSelectRoom);
            if ($row) {
                $roomchoosen = $row['roomID'];
            }
        }

        return $roomchoosen;
    }

    public function processMeetingEvent($existingCustomer, $roomchoosen, $eventdate, $roomname, $numberofguest, $message, $email, $fname, $lname)
    {
        // Select room rate
        $sqlGetRoomRate = "SELECT roomRate FROM rooms WHERE roomName = '" . $roomname . "'";
        $resultGetRoomRate = $this->db->queryNoStmt($sqlGetRoomRate);

        if ($resultGetRoomRate) {
            $row = mysqli_fetch_assoc($resultGetRoomRate);
            $room_rate = $row['roomRate'];

            // insert booking
            $sqlInsertBooking = "INSERT INTO bookings (customerID, roomID, checkinDate, totalAmount, paymentStatus, numberOfCustomer, message) 
                                VALUES ('" . $existingCustomer . "','" . $roomchoosen . "','" . $eventdate . "','" . $room_rate . "','Unpaid','" . $numberofguest . "','" . $message . "')";

            $resultInsertBooking = $this->db->queryNoStmt($sqlInsertBooking);

            if ($resultInsertBooking) {
                // Reupdate room status to Reserved
                $sqlUpdateRoomStatus = "UPDATE rooms SET roomStatus = 'Reserved' WHERE roomID = '" . $roomchoosen . "'";
                $resultUpdateRoomStatus = $this->db->queryNoStmt($sqlUpdateRoomStatus);

                if (!$resultUpdateRoomStatus) {
                    echo "Error updating room status: " . $this->db->getError();
                    // Handle error update room status
                }
            } else {
                echo "Error inserting booking: " . $this->db->getError();
                // Handle error insert new booking
            }
        } else {
            echo "Error getting room rate: " . $this->db->getError();
            // Handle error get room rate
        }

        // Send email confirmation
        $this->sendEmailConfirmation($email, $fname, $lname, $existingCustomer, $eventdate, $roomname, $numberofguest);
    }

    public function listBooking($db)
    {
        $sql = "SELECT BOOKING.BookingID, CUSTOMER.CustomerFirstName, CUSTOMER.CustomerLastName, ROOM.RoomID, ROOM.RoomName, BOOKING.CheckInDate, BOOKING.CheckOutDate, BOOKING.PaymentStatus
        FROM BOOKING
        JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
        JOIN CUSTOMER ON BOOKING.CustomerID = CUSTOMER.CustomerID";
        $result = $db->queryNoStmt($sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['BookingID'] . '</td>';
                echo '<td>' . $row['CustomerFirstName'] . '</td>';
                echo '<td>' . $row['CustomerLastName'] . '</td>';
                echo '<td>' . $row['RoomID'] . '</td>';
                echo '<td>' . $row['RoomName'] . '</td>';
                echo '<td>' . $row['CheckInDate'] . '</td>';
                // echo '<td>' . $row['checkOutDate'] . '</td>';
                echo '<td>' . $row['PaymentStatus'] . '</td>';
                echo '<td>';
                echo '<div class="d-flex">';
                echo '<a href="#viewBookingModal" class="m-1 view" data-toggle="modal" onclick="viewBooking(' . $row['BookingID'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
                echo '<a href="#editBookingModal" class="m-1 edit" data-toggle="modal" onclick="viewBooking(' . $row['BookingID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>';
                echo '<a href="#deleteBookingModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['BookingID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo 'Error executing SQL query: ' . $db->getError();
        }
    }

    public function deleteBooking($db, $id)
    {
        $sql = "DELETE FROM  BOOKING WHERE BookingID  = '$id' ";
        if ($db->queryNoStmt($sql)) {
            return "Record deleted successfully";
        } else {
            return "Error deleting record: " . $db->getError();
        }
        $db->close();
    }

    public function viewBooking($db, $id)
    {
        $sql = "SELECT BOOKING.BookingID, CUSTOMER.CustomerFirstName, CUSTOMER.CustomerLastName, ROOM.RoomID, ROOM.RoomName, BOOKING.CheckInDate, BOOKING.CheckOutDate, BOOKING.PaymentStatus,  BOOKING.TotalAmount, BOOKING.NumberOfCustomer, BOOKING.Message, ROOM.RoomStatus
        FROM BOOKING
        JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
        JOIN CUSTOMER ON BOOKING.CustomerID = CUSTOMER.CustomerID
        WHERE BookingID = '$id'";
        $result = $db->queryNoStmt($sql);
        if ($result) {
            $BookingData = mysqli_fetch_assoc($result);
            $jsonData = json_encode($BookingData);
            return $jsonData;
        } else {
            return 'Error executing SQL query: ' . $db->getError();
        }
        $db->close();
    }

    public function getTotalBooking($db)
    {
        $sqlTotalBooking = "SELECT FORMAT(COUNT(*), 0) AS TotalBooking FROM BOOKING";
        $resultTotalBooking = $db->queryNoStmt($sqlTotalBooking);
        return  $resultTotalBooking;
        $db->close();
    }

    public function addBooking(
        $db,
        $customerID,
        $RoomID,
        $checkoutdate,
        $checkindate,
        $paymentstatus,
        $guests,
        $room_rate
    ) {
        $sqlInsertBooking = "INSERT INTO BOOKING (CustomerID, RoomID, CheckInDate, CheckOutDate, TotalAmount, PaymentStatus,NumberOfCustomer) 
        VALUES ('" . $customerID . "','" . $RoomID . "','" . $checkindate . "','" . $checkoutdate . "','" . $room_rate . "','" . $paymentstatus . "','" . $guests . "')";
        $resultInsertBooking = $db->queryNoStmt($sqlInsertBooking);
        if ($resultInsertBooking) {
            return "Booking added successfully!";
        } else {
            return "Error adding customer: " . $db->getError();
        }
        $db->close();
    }

    public function editBooking(
        $db,
        $BookingID,
        $RoomID,
        $checkoutdate,
        $checkindate,
        $paymentstatus,
        $guests,
        $message,
        $ROOMtatus
    ) {
        $sql = "UPDATE BOOKING 
                JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
                SET 
                BOOKING.RoomID= '" . $RoomID . "', 
                CheckInDate = '" . $checkindate . "', 
                CheckOutDate = '" . $checkoutdate . "', 
                PaymentStatus = '" . $paymentstatus . "', 
                NumberOfCustomer = '" . $guests . "', 
                ROOM.RoomStatus = '" . $ROOMtatus . "', 
                Message = '" . $message . "' 
                WHERE BOOKING.BookingID = '" . $BookingID . "'";
        $result = $db->queryNoStmt($sql);
        if ($result) {
            return "Update successful!";
        } else {
            return "Error updating record: " . $db->getError();
        }
        $db->close();
    }

    public function sortBooking($db, $column_name, $order)
    {

        if ($order == 'desc') {
            $order = 'asc';
        } else {
            $order = 'desc';
        }

        $query = "SELECT BOOKING.BookingID, CUSTOMER.CustomerFirstName, CUSTOMER.CustomerLastName, ROOM.RoomID, ROOM.RoomName, BOOKING.CheckInDate, BOOKING.CheckOutDate, BOOKING.PaymentStatus
        FROM BOOKING
        JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
        JOIN CUSTOMER ON BOOKING.CustomerID = CUSTOMER.CustomerID
        ORDER BY " . $column_name . " " . $order;
        $result = $db->queryNoStmt($query);

        if ($result) {
            $html = '';
            $html .= '<table class="table table-striped table-hover">';
            $html .= '<thead>';
            $html .= '<tr>';
            $html .= '<th>ID</th>';
            $html .= '<th>First Name</th>';
            $html .= '<th>Last Name</th>';
            $html .= '<th><a class="column_sortbooking" id="RoomID" data-order="' . $order . '" href="#">Room ID<i class="bx bx-sort-alt-2"></i></a></th>';
            $html .= '<th><a class="column_sortbooking" id="roomName" data-order="' . $order . '" href="#">Room Name<i class="bx bx-sort-alt-2"></i></a></th>';
            $html .= '<th><a class="column_sortbooking" id="checkinDate" data-order="' . $order . '" href="#">Check In Date<i class="bx bx-sort-alt-2"></i></a></th>';
            // $html .= '<th><a class="column_sortbooking" id="checkOutDate" data-order="' . $order . '" href="#">Check Out Date<i class="bx bx-sort-alt-2"></i></a></th>';
            $html .= '<th><a class="column_sortbooking" id="paymentStatus" data-order="' . $order . '" href="#">Payment Status<i class="bx bx-sort-alt-2"></i></a></th>';
            $html .= '<th>Action</th>';
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody id="booking_data">';
            while ($row = mysqli_fetch_assoc($result)) {
                $html .= '<tr>';
                $html .= '<td>' . $row['BookingID'] . '</td>';
                $html .= '<td>' . $row['CustomerFirstName'] . '</td>';
                $html .= '<td>' . $row['CustomerLastName'] . '</td>';
                $html .= '<td>' . $row['RoomID'] . '</td>';
                $html .= '<td>' . $row['RoomName'] . '</td>';
                $html .= '<td>' . $row['CheckInDate'] . '</td>';
                // $html .= '<td>' . $row['checkOutDate'] . '</td>';
                $html .= '<td>' . $row['PaymentStatus'] . '</td>';
                $html .= '<td>';
                $html .= '<div class="d-flex">';
                $html .= '<a href="#viewBookingModal" class="m-1 view" data-toggle="modal" onclick="viewBooking(' . $row['BookingID'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
                $html .= '<a href="#editBookingModal" class="m-1 edit" data-toggle="modal" onclick="viewBooking(' . $row['BookingID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>';
                $html .= '<a href="#deleteBookingModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['BookingID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>';
                $html .= '</div>';
                $html .= '</td>';
                $html .= '</tr>';
            }
            $html .= '</tbody>';
            $html .= '</table>';
            return $html;
        } else {
            return 'Error executing SQL query: ' . $db->getError();
        }
    }

    public function searchBooking($db, $searchQuery)
    {

        $sql = "SELECT BOOKING.BookingID, CUSTOMER.CustomerFirstName, CUSTOMER.CustomerLastName, ROOM.RoomID, ROOM.RoomName, BOOKING.CheckInDate, BOOKING.CheckOutDate, BOOKING.PaymentStatus
        FROM BOOKING
        JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
        JOIN CUSTOMER ON BOOKING.CustomerID = CUSTOMER.CustomerID
        WHERE CustomerFirstName LIKE '%" . $searchQuery . "%'
            OR CustomerLastName LIKE '%" . $searchQuery . "%'
            OR ROOM.RoomID LIKE '%" . $searchQuery . "%'
            OR ROOM.RoomName LIKE '%" . $searchQuery . "%'";

        $result = $db->queryNoStmt($sql);
        if ($result) {
            $html = '';
            while ($row = mysqli_fetch_assoc($result)) {
                $html .= '<tr>';
                $html .= '<td>' . $row['BookingID'] . '</td>';
                $html .= '<td>' . $row['CustomerFirstName'] . '</td>';
                $html .= '<td>' . $row['CustomerLastName'] . '</td>';
                $html .= '<td>' . $row['RoomID'] . '</td>';
                $html .= '<td>' . $row['RoomName'] . '</td>';
                $html .= '<td>' . $row['CheckInDate'] . '</td>';
                // $html .= '<td>' . $row['checkOutDate'] . '</td>';
                $html .= '<td>' . $row['PaymentStatus'] . '</td>';
                $html .= '<td>';
                $html .= '<div class="d-flex">';
                $html .= '<a href="#viewBookingModal" class="m-1 view" data-toggle="modal" onclick="viewBooking(' . $row['BookingID'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
                $html .= '<a href="#editBookingModal" class="m-1 edit" data-toggle="modal" onclick="viewBooking(' . $row['BookingID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>';
                $html .= '<a href="#deleteBookingModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['BookingID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>';
                $html .= '</div>';
                $html .= '</td>';
                $html .= '</tr>';
            }
            return $html;
        } else {
            return 'Error executing SQL query: ' . $db->getError();
        }
    }

    public function closeConnection()
    {
        // Close the database connection
        $this->db->close();
    }
}
