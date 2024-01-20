<?php
include "../controllers/inc/db_config.php";

$action = isset($_GET['action']) ? $_GET['action'] : '';

require '../../vendor/PHPMailer/src/Exception.php';
require '../../vendor/PHPMailer/src/SMTP.php';
require '../../vendor/PHPMailer/src/PHPMailer.php';
require '../inc/Database.php';
require '../models/Customer.php';
require '../models/Invoice.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$db = new Database();
$db->connect();

switch ($action) {
    case 'listcustomer':
        echo listCustomers($db);
        break;
    case 'listbooking':
        $booking = new Booking();
        echo $booking->listBooking($db);
        break;
    case 'listroom':
        $sql = "SELECT * FROM rooms";
        $result = $this->db->queryNoStmt($sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['roomID'] . '</td>';
                echo '<td>' . $row['roomName'] . '</td>';
                echo '<td>' . $row['roomType'] . '</td>';
                echo '<td>' . $row['roomRate'] . '</td>';
                echo '<td>' . $row['roomStatus'] . '</td>';
                echo '<td>';
                echo '<div class="d-flex">';
                echo '<a href="#viewRoomModal" class="m-1 view" data-toggle="modal" onclick="viewRoom(' . $row['roomID'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
                echo '<a href="#editRoomModal" class="m-1 edit" data-toggle="modal" onclick="viewRoom(' . $row['roomID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>';
                echo '<a href="#deleteRoomModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['roomID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo 'Error executing SQL query: ' . $this->db->getError();
        }
        break;
    case 'listmessage':
        $sql = "SELECT * FROM messages";
        $result = $this->db->queryNoStmt($sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['idMessage'] . '</td>';
                echo '<td>' . $row['sender'] . '</td>';
                echo '<td>' . $row['subject'] . '</td>';
                echo '<td>' . $row['content'] . '</td>';
                echo '<td>' . $row['timestamp'] . '</td>';
                echo '<td>';
                echo '<div class="d-flex">';
                echo '<a href="#viewMessageModal" class="m-1 view" data-toggle="modal" onclick="viewMessage(' . $row['idMessage'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
                echo '<a href="#sendModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['idMessage'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Send">forward_to_inbox</i>
                    </a>';
                echo '<a href="#deleteMessageModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['idMessage'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo 'Error executing SQL query: ' . $this->db->getError();
        }
        break;
    case 'listinvoice':
        echo listInvoice($db);
        break;
    case 'listbill':
        // Execute the SELECT query
        $id = $_GET['idinvoice'];
        $currentDate = date('Y-m-d');
        $nextDay = date('Y-m-d', strtotime($currentDate . ' + 1 day'));

        $sql = "SELECT
                    rooms.roomID,
                    bookings.bookingID,
                    rooms.roomName,
                    rooms.roomRate,
                    TIMESTAMPDIFF(DAY, bookings.checkinDate, '$nextDay') AS duration,
                    invoices.amount
                FROM
                    rooms
                JOIN bookings ON rooms.roomID = bookings.roomID
                JOIN invoices ON bookings.bookingID = invoices.bookingID
                WHERE invoices.invoicelD = '$id';";

        $result = $this->db->queryNoStmt($sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Update records in the invoices table
                $updateInvoiceSql = "UPDATE invoices 
                                    SET paymentDate = '$currentDate',
                                        amount = " . $row['amount'] . "
                                    WHERE invoicelD = '$id';";

                mysqli_query($con, $updateInvoiceSql);

                // Update records in the bookings table
                $bookingID = $row['bookingID'];
                $updateBookingSql = "UPDATE bookings 
                                    SET checkOutDate = '$nextDay',
                                        paymentStatus = 'Paid'
                                    WHERE bookingID = '$bookingID';";

                mysqli_query($con, $updateBookingSql);

                // Update records in the rooms table
                $roomID = $row['roomID'];
                $updateRoomSql = "UPDATE rooms 
                                SET roomStatus = 'Available'
                                WHERE roomID = '$roomID';";

                mysqli_query($con, $updateRoomSql);

                // Display information in HTML if needed
                echo '<tr>';
                echo '<td>' . $row['roomName'] . '</td>';
                echo '<td class="text-center">' . $row['roomRate'] . ' $</td>';
                echo '<td class="text-center">' . $row['duration'] . ' days</td>';
                echo '<td>' . $row['amount'] . ' $</td>';
                echo '</tr>';
            }
        } else {
            echo 'Error executing SQL query: ' . $this->db->getError();
        }
        break;
    case 'deleteCustomer':
        $id = $_GET['idcustomer'];
        echo deleteCustomer($db, $id);
        break;
    case 'deleteBooking':
        $id = $_GET['idbooking'];
        $sql = "DELETE FROM  bookings WHERE bookingID  = '$id' ";

        if (mysqli_query($con, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $this->db->getError();
        }
        break;
    case 'deleteRoom':
        $id = $_GET['idroom'];
        $sql = "DELETE FROM  rooms WHERE roomID  = '$id' ";

        if (mysqli_query($con, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $this->db->getError();
        }
        break;
    case 'deleteMessage':
        $id = $_GET['idmessage'];
        $sql = "DELETE FROM  messages WHERE idMessage  = '$id' ";

        if (mysqli_query($con, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $this->db->getError();
        }
        break;
    case 'viewCustomer':
        $id = $_GET['idcustomer'];
        viewCustomer($db, $id);
        break;
    case 'viewRoom':
        $id = $_GET['idroom'];
        $sql = "SELECT * FROM rooms WHERE roomID = '$id'";
        $result = $this->db->queryNoStmt($sql);

        if ($result) {
            $roomData = mysqli_fetch_assoc($result);

            // Return customer data as JSON
            echo json_encode($roomData);
        } else {
            // Handle the error if needed
            echo 'Error executing SQL query: ' . $this->db->getError();
        }

        break;
    case 'viewBooking':
        $id = $_GET['idbooking'];
        $sql = "SELECT bookings.bookingID, customers.customerFirstName, customers.customerLastName, rooms.roomID, rooms.roomName, bookings.checkinDate, bookings.checkOutDate, bookings.paymentStatus,  bookings.totalAmount, bookings.numberOfCustomer, bookings.message, rooms.roomStatus
        FROM bookings
        JOIN rooms ON bookings.roomID = rooms.roomID
        JOIN customers ON bookings.customerID = customers.customerID
        WHERE bookingID = '$id'";
        $result = $this->db->queryNoStmt($sql);

        if ($result) {
            $BookingData = mysqli_fetch_assoc($result);

            // Return customer data as JSON
            echo json_encode($BookingData);
        } else {
            // Handle the error if needed
            echo 'Error executing SQL query: ' . $this->db->getError();
        }

        break;
    case 'viewMessage':
        $id = $_GET['idmessage'];
        $sql = "SELECT * FROM messages WHERE idMessage = '$id'";
        $result = $this->db->queryNoStmt($sql);

        if ($result) {
            $messageData = mysqli_fetch_assoc($result);

            // Return customer data as JSON
            echo json_encode($messageData);
        } else {
            // Handle the error if needed
            echo 'Error executing SQL query: ' . $this->db->getError();
        }

        break;
    case 'viewInvoice':
        $id = $_GET['idinvoice'];
        echo viewInvoice($db, $id);
        break;
    case 'dashboard':
        // Query to get Total Revenue
        $sqlTotalRevenue = "SELECT FORMAT(SUM(amount), 0) AS TotalRevenue FROM invoices";
        $resultTotalRevenue = $this->db->queryNoStmt($sqlTotalRevenue);

        $dashboardData['TotalRevenue'] = mysqli_fetch_assoc($resultTotalRevenue)['TotalRevenue'];

        // Query to get Total Booking
        $sqlTotalBooking = "SELECT FORMAT(COUNT(*), 0) AS TotalBooking FROM bookings";
        $resultTotalBooking = $this->db->queryNoStmt($sqlTotalBooking);

        $dashboardData['TotalBooking'] = mysqli_fetch_assoc($resultTotalBooking)['TotalBooking'];

        // Query to get Total Customer
        $sqlTotalCustomer = "SELECT FORMAT(COUNT(*), 0) AS TotalCustomer FROM customers";
        $resultTotalCustomer = $this->db->queryNoStmt($sqlTotalCustomer);
        $dashboardData['TotalCustomer'] = mysqli_fetch_assoc($resultTotalCustomer)['TotalCustomer'];

        // Query to get Avg Room
        $sqlAvgRoom = "SELECT FORMAT(AVG(invoices.amount), 0) AS AvgRoom
                        FROM invoices
                        JOIN bookings ON invoices.bookingID = bookings.bookingID
                        JOIN rooms ON bookings.roomID = rooms.roomID
                        WHERE rooms.roomType = 'Suite Room'";
        $resultAvgRoom = $this->db->queryNoStmt($sqlAvgRoom);
        $dashboardData['AvgRoom'] = mysqli_fetch_assoc($resultAvgRoom)['AvgRoom'];

        // Query to get Avg Meeting Event
        $sqlAvgMeetingEvent = "SELECT FORMAT(AVG(invoices.amount), 0) AS AvgMeetingEvent
                                FROM invoices
                                JOIN bookings ON invoices.bookingID = bookings.bookingID
                                JOIN rooms ON bookings.roomID = rooms.roomID
                                WHERE rooms.roomType = 'Event Meeting'";
        $resultAvgMeetingEvent = $this->db->queryNoStmt($sqlAvgMeetingEvent);
        $dashboardData['AvgMeetingEvent'] = mysqli_fetch_assoc($resultAvgMeetingEvent)['AvgMeetingEvent'];

        // Query to get Avg ResBar
        $sqlAvgResBar = "SELECT FORMAT(AVG(invoices.amount), 0) AS AvgResBar
                            FROM invoices
                            JOIN bookings ON invoices.bookingID = bookings.bookingID
                            JOIN rooms ON bookings.roomID = rooms.roomID
                            WHERE rooms.roomType = 'Restaurant and Bar'";
        $resultAvgResBar = $this->db->queryNoStmt($sqlAvgResBar);
        $resultAvgMeetingEvent = $this->db->queryNoStmt($sqlAvgMeetingEvent);

        $dashboardData['AvgResBar'] = mysqli_fetch_assoc($resultAvgResBar)['AvgResBar'];

        // Query to get Avg Customer
        $sqlAvgCustomer = "SELECT FORMAT(AVG(amount), 0) AS AvgCustomer FROM invoices";
        $resultAvgCustomer = $this->db->queryNoStmt($sqlAvgCustomer);
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
        $roomstatus = $_GET['roomstatus'];
        $sql = "INSERT INTO rooms (roomType, roomRate, roomStatus, roomName) 
        VALUES ('" . $roomtype . "', '" . $roomrate . "', '" . $roomstatus . "', '" . $roomname . "')";
        // echo $sql;
        // die();
        // Execute the query
        $result = $this->db->queryNoStmt($sql);
        if ($result) {
            echo "Room added successfully!";
        } else {
            echo "Error adding customer: " . $this->db->getError();
        }

        // Close the database connection
        mysqli_close($con);
        break;
    case 'addBooking':
        $customerID = $_GET['customerID'];
        $roomid = $_GET['roomid'];
        $checkoutdate = $_GET['checkoutdate'];
        $checkindate = $_GET['checkindate'];
        $paymentstatus = $_GET['paymentstatus'];
        $guests = $_GET['guests'];

        $sqlUpdateRoomStatus = "UPDATE rooms SET roomStatus = 'Reserved' WHERE roomID = '" . $roomid . "'";
        $resultUpdateRoomStatus = $this->db->queryNoStmt($sqlUpdateRoomStatus);

        if (!$resultUpdateRoomStatus) {
            throw new Exception("Error updating room status: " . $this->db->getError());
        }

        // Get room rate
        $sqlGetRoomRate = "SELECT roomRate FROM rooms WHERE roomID = '" . $roomid . "'";
        $resultGetRoomRate = $this->db->queryNoStmt($sqlGetRoomRate);


        if (!$resultGetRoomRate) {
            throw new Exception("Error getting room rate: " . $this->db->getError());
        }

        $row = mysqli_fetch_assoc($resultGetRoomRate);
        $room_rate = $row['roomRate'];

        // Insert booking
        $sqlInsertBooking = "INSERT INTO bookings (customerID, roomID, checkinDate, checkOutDate, totalAmount, paymentStatus, numberOfCustomer) 
                            VALUES ('" . $customerID . "','" . $roomid . "','" . $checkindate . "','" . $checkoutdate . "','" . $room_rate . "','" . $paymentstatus . "','" . $guests . "')";
        $resultInsertBooking = $this->db->queryNoStmt($sqlInsertBooking);

        if ($resultInsertBooking) {
            echo "Booking added successfully!";
        } else {
            echo "Error adding customer: " . $this->db->getError();
        }

        // Close the database connection
        mysqli_close($con);
        break;
    case 'editBooking':
        // Get values from the GET parameters
        $bookingid = $_GET['bookingid'];
        $roomid = $_GET['roomid'];
        $checkoutdate = $_GET['checkoutdate'];
        $checkindate = $_GET['checkindate'];
        $paymentstatus = $_GET['paymentstatus'];
        $guests = $_GET['guests'];
        $message = $_GET['message'];
        $roomstatus = $_GET['roomstatus'];
        $sql = "UPDATE bookings 
                JOIN rooms ON bookings.roomID = rooms.roomID
                SET 
                bookings.roomID= '" . $roomid . "', 
                checkinDate = '" . $checkindate . "', 
                checkOutDate = '" . $checkoutdate . "', 
                paymentStatus = '" . $paymentstatus . "', 
                numberOfCustomer = '" . $guests . "', 
                rooms.roomStatus = '" . $roomstatus . "', 
                message = '" . $message . "' 
                WHERE bookings.bookingID = '" . $bookingid . "'";

        // Execute the query
        $result = $this->db->queryNoStmt($sql);

        // Check for errors
        if ($result) {
            // Query executed successfully
            echo "Update successful!";
        } else {
            // Query failed
            echo "Error updating record: " . $this->db->getError();
        }
        // Check if roomStatus is 'Occupied'
        if ($roomstatus == 'Occupied') {
            // Get room rate (amount) from the rooms table based on roomid
            $getRoomRateQuery = "SELECT roomRate FROM rooms WHERE roomID = '$roomid'";
            $result = mysqli_query($con, $getRoomRateQuery);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $amount = $row['roomRate'];

                // Insert data into the invoices table with bookingID and amount
                $insertInvoiceQuery = "INSERT INTO `invoices`(`bookingID`, `amount`) VALUES ('" . $bookingid . "', '" . $amount . "')";
                $insertResult = $this->db->queryNoStmt($insertInvoiceQuery);

                if (!$insertResult) {
                    // Handle error if needed
                    echo 'Error inserting into invoices table: ' . $this->db->getError();
                }
            } else {
                // Handle error if needed
                echo 'Error fetching roomRate: ' . $this->db->getError();
            }
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
        $roomid = $_GET['roomid'];
        $roomname = $_GET['roomname'];
        $roomtype = $_GET['roomtype'];
        $roomrate = $_GET['roomrate'];
        $roomstatus = $_GET['roomstatus'];

        $sql = "UPDATE rooms 
                SET 
                    roomType = '" . $roomtype . "' ,
                    roomRate = '" . $roomrate . "' ,
                    roomStatus = '" . $roomstatus . "' ,
                    roomName = '" . $roomname . "' 
                WHERE roomID = '" . $roomid . "'";
        // Execute the query
        $result = $this->db->queryNoStmt($sql);

        // Check for errors
        if ($result) {
            // Query executed successfully
            echo "Update successful!";
        } else {
            // Query failed
            echo "Error updating record: " . $this->db->getError();
        }
        break;
    case 'sortcustomer':
        $column_name = $_GET['column_name'];
        $order = $_GET["order"];
        echo sortCustomer($db, $column_name, $order);
        break;
    case 'sortroom':
        $column_name = $_GET['column_name'];
        $order = $_GET["order"];

        if ($order == 'desc') {
            $order = 'asc';
        } else {
            $order = 'desc';
        }

        $query = "SELECT * FROM rooms ORDER BY " . $_GET["column_name"] . " " . $_GET["order"];
        $result = $this->db->queryNoStmt($query);

        if ($result) {

            echo '<table class="table table-striped table-hover">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th><a class="column_sortroom" id="roomName" data-order="' . $order . '" href="#">Room Name<i class="bx bx-sort-alt-2"></i></a></th>';
            echo '<th><a class="column_sortroom" id="roomType" data-order="' . $order . '" href="#">Room Type<i class="bx bx-sort-alt-2"></i></a></th>';
            echo '<th><a class="column_sortroom" id="roomRate" data-order="' . $order . '" href="#">Room Rate<i class="bx bx-sort-alt-2"></i></a></th>';
            echo '<th><a class="column_sortroom" id="roomStatus" data-order="' . $order . '" href="#">Room Status<i class="bx bx-sort-alt-2"></i></a></th>';
            echo '<th>Action</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody id="room_data">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['roomID'] . '</td>';
                echo '<td>' . $row['roomName'] . '</td>';
                echo '<td>' . $row['roomType'] . '</td>';
                echo '<td>' . $row['roomRate'] . '</td>';
                echo '<td>' . $row['roomStatus'] . '</td>';
                echo '<td>';
                echo '<div class="d-flex">';
                echo '<a href="#viewRoomModal" class="m-1 view" data-toggle="modal" onclick="viewRoom(' . $row['roomID'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
                echo '<a href="#editRoomModal" class="m-1 edit" data-toggle="modal" onclick="viewRoom(' . $row['roomID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>';
                echo '<a href="#deleteRoomModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['roomID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo 'Error executing SQL query: ' . $this->db->getError();
        }
        break;
    case 'sortbooking':
        $column_name = $_GET['column_name'];
        $order = $_GET["order"];

        if ($order == 'desc') {
            $order = 'asc';
        } else {
            $order = 'desc';
        }

        $query = "SELECT bookings.bookingID, customers.customerFirstName, customers.customerLastName, rooms.roomID, rooms.roomName, bookings.checkinDate, bookings.checkOutDate, bookings.paymentStatus
        FROM bookings
        JOIN rooms ON bookings.roomID = rooms.roomID
        JOIN customers ON bookings.customerID = customers.customerID
        ORDER BY " . $_GET["column_name"] . " " . $_GET["order"];
        $result = $this->db->queryNoStmt($query);

        if ($result) {

            echo '<table class="table table-striped table-hover">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>First Name</th>';
            echo '<th>Last Name</th>';
            echo '<th><a class="column_sortbooking" id="roomID" data-order="' . $order . '" href="#">Room ID<i class="bx bx-sort-alt-2"></i></a></th>';
            echo '<th><a class="column_sortbooking" id="roomName" data-order="' . $order . '" href="#">Room Name<i class="bx bx-sort-alt-2"></i></a></th>';
            echo '<th><a class="column_sortbooking" id="checkinDate" data-order="' . $order . '" href="#">Check In Date<i class="bx bx-sort-alt-2"></i></a></th>';
            // echo '<th><a class="column_sortbooking" id="checkOutDate" data-order="' . $order . '" href="#">Check Out Date<i class="bx bx-sort-alt-2"></i></a></th>';
            echo '<th><a class="column_sortbooking" id="paymentStatus" data-order="' . $order . '" href="#">Payment Status<i class="bx bx-sort-alt-2"></i></a></th>';
            echo '<th>Action</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody id="booking_data">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['bookingID'] . '</td>';
                echo '<td>' . $row['customerFirstName'] . '</td>';
                echo '<td>' . $row['customerLastName'] . '</td>';
                echo '<td>' . $row['roomID'] . '</td>';
                echo '<td>' . $row['roomName'] . '</td>';
                echo '<td>' . $row['checkinDate'] . '</td>';
                // echo '<td>' . $row['checkOutDate'] . '</td>';
                echo '<td>' . $row['paymentStatus'] . '</td>';
                echo '<td>';
                echo '<div class="d-flex">';
                echo '<a href="#viewBookingModal" class="m-1 view" data-toggle="modal" onclick="viewBooking(' . $row['bookingID'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
                echo '<a href="#editBookingModal" class="m-1 edit" data-toggle="modal" onclick="viewBooking(' . $row['bookingID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>';
                echo '<a href="#deleteBookingModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['bookingID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo 'Error executing SQL query: ' . $this->db->getError();
        }
        break;
    case 'customer':
        // Get values from the GET parameters
        $searchQuery = $_GET['searchQuery'];
        echo searchCustomer($db, $searchQuery);
        break;
    case 'room':
        // Get values from the GET parameters
        $searchQuery = $_GET['searchQuery'];

        $sql = "SELECT * FROM rooms 
                WHERE roomID LIKE '%" . $searchQuery . "%'
                OR  roomName LIKE '%" . $searchQuery . "%'
                OR  roomType LIKE '%" . $searchQuery . "%'
                OR  roomRate LIKE '%" . $searchQuery . "%'
                OR  roomStatus LIKE '%" . $searchQuery . "%'";

        $result = $this->db->queryNoStmt($sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['roomID'] . '</td>';
                echo '<td>' . $row['roomName'] . '</td>';
                echo '<td>' . $row['roomType'] . '</td>';
                echo '<td>' . $row['roomRate'] . '</td>';
                echo '<td>' . $row['roomStatus'] . '</td>';
                echo '<td>';
                echo '<div class="d-flex">';
                echo '<a href="#viewRoomModal" class="m-1 view" data-toggle="modal" onclick="viewRoom(' . $row['roomID'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
                echo '<a href="#editRoomModal" class="m-1 edit" data-toggle="modal" onclick="viewRoom(' . $row['roomID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>';
                echo '<a href="#deleteRoomModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['roomID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo 'Error executing SQL query: ' . $this->db->getError();
        }
        break;
    case 'booking':
        // Get values from the GET parameters
        $searchQuery = $_GET['searchQuery'];

        $sql = "SELECT bookings.bookingID, customers.customerFirstName, customers.customerLastName, rooms.roomID, rooms.roomName, bookings.checkinDate, bookings.checkOutDate, bookings.paymentStatus
        FROM bookings
        JOIN rooms ON bookings.roomID = rooms.roomID
        JOIN customers ON bookings.customerID = customers.customerID
        WHERE customerFirstName LIKE '%" . $searchQuery . "%'
            OR customerLastName LIKE '%" . $searchQuery . "%'
            OR rooms.roomID LIKE '%" . $searchQuery . "%'
            OR rooms.roomName LIKE '%" . $searchQuery . "%'";

        $result = $this->db->queryNoStmt($sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['bookingID'] . '</td>';
                echo '<td>' . $row['customerFirstName'] . '</td>';
                echo '<td>' . $row['customerLastName'] . '</td>';
                echo '<td>' . $row['roomID'] . '</td>';
                echo '<td>' . $row['roomName'] . '</td>';
                echo '<td>' . $row['checkinDate'] . '</td>';
                // echo '<td>' . $row['checkOutDate'] . '</td>';
                echo '<td>' . $row['paymentStatus'] . '</td>';
                echo '<td>';
                echo '<div class="d-flex">';
                echo '<a href="#viewBookingModal" class="m-1 view" data-toggle="modal" onclick="viewBooking(' . $row['bookingID'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
                echo '<a href="#editBookingModal" class="m-1 edit" data-toggle="modal" onclick="viewBooking(' . $row['bookingID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>';
                echo '<a href="#deleteBookingModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['bookingID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo 'Error executing SQL query: ' . $this->db->getError();
        }
        break;
    case 'invoice':
        // Get values from the GET parameters
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
        //  echo"can't reach";
        break;
}
