<?php
$action = isset($_GET['action']) ? $_GET['action'] : '';

// require '../../vendor/PHPMailer/src/Exception.php';
// require '../../vendor/PHPMailer/src/SMTP.php';
// require '../../vendor/PHPMailer/src/PHPMailer.php';

require '../models/Customer.php';
require '../models/Invoice.php';
require '../models/Booking.php';
require '../models/Room.php';
require '../models/Message.php';
// require '../models/BookingService.php';
// require '../models/Service.phpphp';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$db = new Database();
$db->connect();

switch ($action) {
    case 'listcustomer':
        echo listCustomer($db);
        break;
    case 'listbooking':
        $booking = new Booking();
        echo $booking->listBooking($db);
        break;
    case 'listroom':
        echo listRoom($db);
        break;
    case 'listmessage':
        echo listMessage($db);
        break;
    case 'listinvoice':
        echo listInvoice($db);
        break;
    case 'listbill':
        $id = $_GET['idinvoice'];
        echo listBill($db, $id);
        break;
    case 'deleteCustomer':
        $id = $_GET['idcustomer'];
        echo deleteCustomer($db, $id);
        break;
    case 'deleteBooking':
        $id = $_GET['idbooking'];
        $booking = new Booking();
        echo $booking->deleteBooking($db, $id);
        break;
    case 'deleteRoom':
        $id = $_GET['idroom'];
        echo deleteRoom($db, $id);
        break;
    case 'deleteMessage':
        $id = $_GET['idmessage'];
        echo deleteMessage($db, $id);
        break;
    case 'viewCustomer':
        $id = $_GET['idcustomer'];
        viewCustomer($db, $id);
        break;
    case 'viewRoom':
        $id = $_GET['idroom'];
        echo viewRoom($db, $id);
        break;
    case 'viewBooking':
        $id = $_GET['idbooking'];
        $booking = new Booking();
        echo $booking->viewBooking($db, $id);
        break;
    case 'viewMessage':
        $id = $_GET['idmessage'];
        echo viewMessage($db, $id);
        break;
    case 'viewInvoice':
        $id = $_GET['idinvoice'];
        echo viewInvoice($db, $id);
        break;
    case 'dashboard':
        // Query to get Total Revenue
        $resultTotalRevenue = getTotalRevenue($db);
        $dashboardData['TotalRevenue'] = mysqli_fetch_assoc($resultTotalRevenue)['TotalRevenue'];

        // Query to get Total Booking
        $booking = new Booking();
        $resultTotalBooking = $booking->getTotalBooking($db);
        $dashboardData['TotalBooking'] = mysqli_fetch_assoc($resultTotalBooking)['TotalBooking'];

        // Query to get Total Customer
        $resultTotalCustomer = getTotalCustomer($db);
        $dashboardData['TotalCustomer'] = mysqli_fetch_assoc($resultTotalCustomer)['TotalCustomer'];

        // Query to get Avg Room
        $resultAvgRoom = getAvgRoom($db);
        $dashboardData['AvgRoom'] = mysqli_fetch_assoc($resultAvgRoom)['AvgRoom'];

        // Query to get Avg Meeting Event
        $resultAvgMeetingEvent = getAvgMeetingEvent($db);
        $dashboardData['AvgMeetingEvent'] = mysqli_fetch_assoc($resultAvgMeetingEvent)['AvgMeetingEvent'];

        // Query to get Avg ResBar
        $resultAvgResBar = getAvgResBar($db);
        $resultAvgMeetingEvent = $db->queryNoStmt($sqlAvgMeetingEvent);

        $dashboardData['AvgResBar'] = mysqli_fetch_assoc($resultAvgResBar)['AvgResBar'];

        // Query to get Avg Customer
        $resultAvgCustomer = getAvgCustomer($db);
        $dashboardData['AvgCustomer'] = mysqli_fetch_assoc($resultAvgCustomer)['AvgCustomer'];
        // Return dashboard data as JSON
        echo json_encode($dashboardData);
        break;
    case 'addCustomer':
        $firstName = $_GET['firstName'];
        $lastName = $_GET['lastName'];
        $dob = $_GET['dob'];
        $email = $_GET['email'];
        $phoneNumber = $_GET['phoneNumber'];
        $address = $_GET['address'];
        echo addCustomer($db, $firstName, $lastName, $dob, $email, $phoneNumber, $address);
        break;
    case 'addRoom':
        $roomname = $_GET['roomname'];
        $roomtype = $_GET['roomtype'];
        $roomrate = $_GET['roomrate'];
        $ROOMtatus = $_GET['ROOMtatus'];
        echo addRoom(
            $edb,
            $roomname,
            $roomtype,
            $roomrate,
            $ROOMtatus
        );
        break;
    case 'addBooking':
        $customerID = $_GET['customerID'];
        $RoomID = $_GET['RoomID'];
        $checkoutdate = $_GET['checkoutdate'];
        $checkindate = $_GET['checkindate'];
        $paymentstatus = $_GET['paymentstatus'];
        $guests = $_GET['guests'];

        updateRoomStatus($db, $RoomID);
        $room_rate = getRoomRate($db, $RoomID);

        // Insert booking
        $booking = new Booking();
        echo $booking->addBooking(
            $db,
            $customerID,
            $RoomID,
            $checkoutdate,
            $checkindate,
            $paymentstatus,
            $guests,
            $room_rate
        );
        break;
    case 'editBooking':
        // Get values from the GET parameters
        $BookingID = $_GET['BookingID'];
        $RoomID = $_GET['RoomID'];
        $checkoutdate = $_GET['checkoutdate'];
        $checkindate = $_GET['checkindate'];
        $paymentstatus = $_GET['paymentstatus'];
        $guests = $_GET['guests'];
        $message = $_GET['message'];
        $ROOMtatus = $_GET['ROOMtatus'];
        $booking = new Booking();
        echo $booking->editBooking(
            $db,
            $BookingID,
            $RoomID,
            $checkoutdate,
            $checkindate,
            $paymentstatus,
            $guests,
            $message,
            $ROOMtatus
        );

        // Check if ROOMtatus is 'Occupied'
        if ($ROOMtatus == 'Occupied') {
            // Get room rate (amount) from the ROOM table based on RoomID
            $amount = getRoomRate($db, $RoomID);
            echo addInvoice($db, $BookingID, $amount);
        }
        break;
    case 'editCustomer':
        // Get values from the GET parameters
        $customerid = $_GET['customerid'];
        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        $dob = $_GET['dob'];
        $email = $_GET['email'];
        $phone = $_GET['phone'];
        $address = $_GET['address'];
        echo editCustomer(
            $db,
            $customerid,
            $firstname,
            $lastname,
            $dob,
            $email,
            $phone,
            $address
        );
        break;
    case 'editRoom':
        // Get values from the GET parameters
        $RoomID = $_GET['RoomID'];
        $roomname = $_GET['roomname'];
        $roomtype = $_GET['roomtype'];
        $roomrate = $_GET['roomrate'];
        $ROOMtatus = $_GET['ROOMtatus'];
        echo editRoom(
            $db,
            $RoomID,
            $roomname,
            $roomtype,
            $roomrate,
            $ROOMtatus
        );
        break;
    case 'sortcustomer':
        $column_name = $_GET['column_name'];
        $order = $_GET["order"];
        echo sortCustomer($db, $column_name, $order);
        break;
    case 'sortroom':
        $column_name = $_GET['column_name'];
        $order = $_GET["order"];
        echo sortRoom($db, $column_name, $order);
        break;
    case 'sortbooking':
        $column_name = $_GET['column_name'];
        $order = $_GET["order"];
        $booking = new Booking();
        echo $booking->sortBooking($db, $column_name, $order);
        break;
    case 'customer':
        $searchQuery = $_GET['searchQuery'];
        echo searchCustomer($db, $searchQuery);
        break;
    case 'room':
        $searchQuery = $_GET['searchQuery'];
        echo searchRoom($db, $searchQuery);
        break;
    case 'booking':
        $searchQuery = $_GET['searchQuery'];
        $booking = new Booking();
        echo $booking->searchBooking($db, $searchQuery);
        break;
    case 'invoice':
        $searchQuery = $_GET['searchQuery'];
        echo searchInvoie($db, $searchQuery);
        break;
    case 'sendMessage':
        $sender = $_GET['sender'];
        $subject = $_GET['subject'];
        $content = $_GET['content'];

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
            $mail->setFrom('santelacuisine@gmail.com', 'SaiGon Hotel');
            $mail->addAddress($sender);     // Add a recipient

            // Content
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = $subject;

            // Email body
            $mail->Body =  $content;

            // Plain text version for non-HTML mail clients
            $mail->AltBody = 'Thank you for choosing SaiGonHotel! Your meeting event has been confirmed.';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        break;
    default:
        break;
}
