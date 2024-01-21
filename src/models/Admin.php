<?php
$action = isset($_GET['action']) ? $_GET['action'] : '';

// require '../../vendor/PHPMailer/src/Exception.php';
// require '../../vendor/PHPMailer/src/SMTP.php';
// require '../../vendor/PHPMailer/src/PHPMailer.php';
// require '../inc/Database.php';
require '../models/Customer.php';
require '../models/Invoice.php';
require '../models/Booking.php';



// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

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
        $sql = "SELECT * FROM ROOM";
        $result = $db->queryNoStmt($sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['RoomID'] . '</td>';
                echo '<td>' . $row['RoomName'] . '</td>';
                echo '<td>' . $row['RoomType'] . '</td>';
                echo '<td>' . $row['RoomRate'] . '</td>';
                echo '<td>' . $row['RoomStatus'] . '</td>';
                echo '<td>';
                echo '<div class="d-flex">';
                echo '<a href="#viewRoomModal" class="m-1 view" data-toggle="modal" onclick="viewRoom(' . $row['RoomID'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
                echo '<a href="#editRoomModal" class="m-1 edit" data-toggle="modal" onclick="viewRoom(' . $row['RoomID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>';
                echo '<a href="#deleteRoomModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['RoomID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo 'Error executing SQL query: ' . $db->getError();
        }
        break;
    case 'listmessage':
        $sql = "SELECT * FROM MESSAGE";
        $result = $db->queryNoStmt($sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['MessageID'] . '</td>';
                echo '<td>' . $row['Sender'] . '</td>';
                echo '<td>' . $row['Subject'] . '</td>';
                echo '<td>' . $row['Content'] . '</td>';
                echo '<td>' . $row['Timestamp'] . '</td>';
                echo '<td>';
                echo '<div class="d-flex">';
                echo '<a href="#viewMessageModal" class="m-1 view" data-toggle="modal" onclick="viewMessage(' . $row['MessageID'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
                echo '<a href="#sendModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['MessageID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Send">forward_to_inbox</i>
                    </a>';
                echo '<a href="#deleteMessageModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['MessageID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo 'Error executing SQL query: ' . $db->getError();
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
                    ROOM.RoomID,
                    BOOKING.BookingID,
                    ROOM.RoomName,
                    ROOM.RoomRate,
                    TIMESTAMPDIFF(DAY, BOOKING.CheckInDate, '$nextDay') AS duration,
                    INVOICE.Amount
                FROM
                    ROOM
                JOIN BOOKING ON ROOM.RoomID = BOOKING.RoomID
                JOIN INVOICE ON BOOKING.BookingID = INVOICE.BookingID
                WHERE INVOICE.InvoicelD = '$id';";

        $result = $db->queryNoStmt($sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Update records in the INVOICE table
                $updateINVOICEql = "UPDATE INVOICE 
                                    SET PaymentDate = '$currentDate',
                                        Amount = " . $row['Amount'] . "
                                    WHERE InvoicelD = '$id';";

                $db->queryNoStmt($updateINVOICEql);

                // Update records in the BOOKING table
                $BookingID = $row['BookingID'];
                $updateBOOKINGql = "UPDATE BOOKING 
                                    SET checkOutDate = '$nextDay',
                                        paymentStatus = 'Paid'
                                    WHERE BookingID = '$BookingID';";

                $db->queryNoStmt($updateBOOKINGql);

                // Update records in the ROOM table
                $RoomID = $row['RoomID'];
                $updateROOMql = "UPDATE ROOM 
                                SET RoomStatus = 'Available'
                                WHERE RoomID = '$RoomID';";

                $db->queryNoStmt($updateROOMql);

                // Display information in HTML if needed
                echo '<tr>';
                echo '<td>' . $row['RoomName'] . '</td>';
                echo '<td class="text-center">' . $row['RoomRate'] . ' $</td>';
                echo '<td class="text-center">' . $row['duration'] . ' days</td>';
                echo '<td>' . $row['Amount'] . ' $</td>';
                echo '</tr>';
            }
        } else {
            echo 'Error executing SQL query: ' . $db->getError();
        }
        break;
    case 'deleteCustomer':
        $id = $_GET['idcustomer'];
        echo deleteCustomer($db, $id);
        break;
    case 'deleteBooking':
        $id = $_GET['idbooking'];
        $sql = "DELETE FROM  BOOKING WHERE BookingID  = '$id' ";

        if ($db->queryNoStmt($sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $db->getError();
        }
        break;
    case 'deleteRoom':
        $id = $_GET['idroom'];
        $sql = "DELETE FROM  ROOM WHERE RoomID  = '$id' ";

        if ($db->queryNoStmt($sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $db->getError();
        }
        break;
    case 'deleteMessage':
        $id = $_GET['MessageID'];
        $sql = "DELETE FROM  MESSAGE WHERE MessageID  = '$id' ";

        if ($db->queryNoStmt($sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $db->getError();
        }
        break;
    case 'viewCustomer':
        $id = $_GET['idcustomer'];
        viewCustomer($db, $id);
        break;
    case 'viewRoom':
        $id = $_GET['idroom'];
        $sql = "SELECT * FROM ROOM WHERE RoomID = '$id'";
        $result = $db->queryNoStmt($sql);

        if ($result) {
            $roomData = mysqli_fetch_assoc($result);

            // Return customer data as JSON
            echo json_encode($roomData);
        } else {
            // Handle the error if needed
            echo 'Error executing SQL query: ' . $db->getError();
        }

        break;
    case 'viewBooking':
        $id = $_GET['idbooking'];
        $sql = "SELECT BOOKING.BookingID, CUSTOMER.customerFirstName, CUSTOMER.customerLastName, ROOM.RoomID, ROOM.roomName, BOOKING.checkinDate, BOOKING.checkOutDate, BOOKING.paymentStatus,  BOOKING.totalAmount, BOOKING.numberOfCustomer, BOOKING.message, ROOM.ROOMtatus
        FROM BOOKING
        JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
        JOIN CUSTOMER ON BOOKING.customerID = CUSTOMER.customerID
        WHERE BookingID = '$id'";
        $result = $db->queryNoStmt($sql);

        if ($result) {
            $BookingData = mysqli_fetch_assoc($result);

            // Return customer data as JSON
            echo json_encode($BookingData);
        } else {
            // Handle the error if needed
            echo 'Error executing SQL query: ' . $db->getError();
        }

        break;
    case 'viewMessage':
        $id = $_GET['MessageID'];
        $sql = "SELECT * FROM MESSAGE WHERE MessageID = '$id'";
        $result = $db->queryNoStmt($sql);

        if ($result) {
            $messageData = mysqli_fetch_assoc($result);

            // Return customer data as JSON
            echo json_encode($messageData);
        } else {
            // Handle the error if needed
            echo 'Error executing SQL query: ' . $db->getError();
        }

        break;
    case 'viewInvoice':
        $id = $_GET['idinvoice'];
        echo viewInvoice($db, $id);
        break;
    case 'dashboard':
        // Query to get Total Revenue
        $sqlTotalRevenue = "SELECT FORMAT(SUM(Amount), 0) AS TotalRevenue FROM INVOICE";
        $resultTotalRevenue = $db->queryNoStmt($sqlTotalRevenue);

        $dashboardData['TotalRevenue'] = mysqli_fetch_assoc($resultTotalRevenue)['TotalRevenue'];

        // Query to get Total Booking
        $sqlTotalBooking = "SELECT FORMAT(COUNT(*), 0) AS TotalBooking FROM BOOKING";
        $resultTotalBooking = $db->queryNoStmt($sqlTotalBooking);

        $dashboardData['TotalBooking'] = mysqli_fetch_assoc($resultTotalBooking)['TotalBooking'];

        // Query to get Total Customer
        $sqlTotalCustomer = "SELECT FORMAT(COUNT(*), 0) AS TotalCustomer FROM CUSTOMER";
        $resultTotalCustomer = $db->queryNoStmt($sqlTotalCustomer);
        $dashboardData['TotalCustomer'] = mysqli_fetch_assoc($resultTotalCustomer)['TotalCustomer'];

        // Query to get Avg Room
        $sqlAvgRoom = "SELECT FORMAT(AVG(INVOICE.Amount), 0) AS AvgRoom
                        FROM INVOICE
                        JOIN BOOKING ON INVOICE.BookingID = BOOKING.BookingID
                        JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
                        WHERE ROOM.RoomType = 'Suite Room'";
        $resultAvgRoom = $db->queryNoStmt($sqlAvgRoom);
        $dashboardData['AvgRoom'] = mysqli_fetch_assoc($resultAvgRoom)['AvgRoom'];

        // Query to get Avg Meeting Event
        $sqlAvgMeetingEvent = "SELECT FORMAT(AVG(INVOICE.Amount), 0) AS AvgMeetingEvent
                                FROM INVOICE
                                JOIN BOOKING ON INVOICE.BookingID = BOOKING.BookingID
                                JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
                                WHERE ROOM.RoomType = 'Event Meeting'";
        $resultAvgMeetingEvent = $db->queryNoStmt($sqlAvgMeetingEvent);
        $dashboardData['AvgMeetingEvent'] = mysqli_fetch_assoc($resultAvgMeetingEvent)['AvgMeetingEvent'];

        // Query to get Avg ResBar
        $sqlAvgResBar = "SELECT FORMAT(AVG(INVOICE.Amount), 0) AS AvgResBar
                            FROM INVOICE
                            JOIN BOOKING ON INVOICE.BookingID = BOOKING.BookingID
                            JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
                            WHERE ROOM.RoomType = 'Restaurant and Bar'";
        $resultAvgResBar = $db->queryNoStmt($sqlAvgResBar);
        $resultAvgMeetingEvent = $db->queryNoStmt($sqlAvgMeetingEvent);

        $dashboardData['AvgResBar'] = mysqli_fetch_assoc($resultAvgResBar)['AvgResBar'];

        // Query to get Avg Customer
        $sqlAvgCustomer = "SELECT FORMAT(AVG(Amount), 0) AS AvgCustomer FROM INVOICE";
        $resultAvgCustomer = $db->queryNoStmt($sqlAvgCustomer);
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
        $sql = "INSERT INTO ROOM (roomType, roomRate, ROOMtatus, roomName) 
        VALUES ('" . $roomtype . "', '" . $roomrate . "', '" . $ROOMtatus . "', '" . $roomname . "')";
        // echo $sql;
        // die();
        // Execute the query
        $result = $db->queryNoStmt($sql);
        if ($result) {
            echo "Room added successfully!";
        } else {
            echo "Error adding customer: " . $db->getError();
        }

        // Close the database connection
        mysqli_close($con);
        break;
    case 'addBooking':
        $customerID = $_GET['customerID'];
        $RoomID = $_GET['RoomID'];
        $checkoutdate = $_GET['checkoutdate'];
        $checkindate = $_GET['checkindate'];
        $paymentstatus = $_GET['paymentstatus'];
        $guests = $_GET['guests'];

        $sqlUpdateROOMtatus = "UPDATE ROOM SET Roomstatus = 'Reserved' WHERE RoomID = '" . $RoomID . "'";
        $resultUpdateROOMtatus = $db->queryNoStmt($sqlUpdateROOMtatus);

        if (!$resultUpdateROOMtatus) {
            throw new Exception("Error updating room status: " . $db->getError());
        }

        // Get room rate
        $sqlGetRoomRate = "SELECT RoomRate FROM ROOM WHERE RoomID = '" . $RoomID . "'";
        $resultGetRoomRate = $db->queryNoStmt($sqlGetRoomRate);


        if (!$resultGetRoomRate) {
            throw new Exception("Error getting room rate: " . $db->getError());
        }

        $row = mysqli_fetch_assoc($resultGetRoomRate);
        $room_rate = $row['roomRate'];

        // Insert booking
        $sqlInsertBooking = "INSERT INTO BOOKING (customerID, RoomID, checkinDate, checkOutDate, totalAmount, paymentStatus, numberOfCustomer) 
                            VALUES ('" . $customerID . "','" . $RoomID . "','" . $checkindate . "','" . $checkoutdate . "','" . $room_rate . "','" . $paymentstatus . "','" . $guests . "')";
        $resultInsertBooking = $db->queryNoStmt($sqlInsertBooking);

        if ($resultInsertBooking) {
            echo "Booking added successfully!";
        } else {
            echo "Error adding customer: " . $db->getError();
        }

        // Close the database connection
        mysqli_close($con);
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
        $sql = "UPDATE BOOKING 
                JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
                SET 
                BOOKING.RoomID= '" . $RoomID . "', 
                checkinDate = '" . $checkindate . "', 
                checkOutDate = '" . $checkoutdate . "', 
                paymentStatus = '" . $paymentstatus . "', 
                numberOfCustomer = '" . $guests . "', 
                ROOM.ROOMtatus = '" . $ROOMtatus . "', 
                message = '" . $message . "' 
                WHERE BOOKING.BookingID = '" . $BookingID . "'";

        // Execute the query
        $result = $db->queryNoStmt($sql);

        // Check for errors
        if ($result) {
            // Query executed successfully
            echo "Update successful!";
        } else {
            // Query failed
            echo "Error updating record: " . $db->getError();
        }
        // Check if ROOMtatus is 'Occupied'
        if ($ROOMtatus == 'Occupied') {
            // Get room rate (amount) from the ROOM table based on RoomID
            $getRoomRateQuery = "SELECT roomRate FROM ROOM WHERE RoomID = '$RoomID'";
            $result = $db->queryNoStmt($getRoomRateQuery);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $amount = $row['roomRate'];

                // Insert data into the INVOICE table with BookingID and amount
                $insertInvoiceQuery = "INSERT INTO `INVOICE`(`BookingID`, `amount`) VALUES ('" . $BookingID . "', '" . $amount . "')";
                $insertResult = $db->queryNoStmt($insertInvoiceQuery);

                if (!$insertResult) {
                    // Handle error if needed
                    echo 'Error inserting into INVOICE table: ' . $db->getError();
                }
            } else {
                // Handle error if needed
                echo 'Error fetching roomRate: ' . $db->getError();
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
        $RoomID = $_GET['RoomID'];
        $roomname = $_GET['roomname'];
        $roomtype = $_GET['roomtype'];
        $roomrate = $_GET['roomrate'];
        $ROOMtatus = $_GET['ROOMtatus'];

        $sql = "UPDATE ROOM 
                SET 
                    roomType = '" . $roomtype . "' ,
                    roomRate = '" . $roomrate . "' ,
                    ROOMtatus = '" . $ROOMtatus . "' ,
                    roomName = '" . $roomname . "' 
                WHERE RoomID = '" . $RoomID . "'";
        // Execute the query
        $result = $db->queryNoStmt($sql);

        // Check for errors
        if ($result) {
            // Query executed successfully
            echo "Update successful!";
        } else {
            // Query failed
            echo "Error updating record: " . $db->getError();
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

        $query = "SELECT * FROM ROOM ORDER BY " . $_GET["column_name"] . " " . $_GET["order"];
        $result = $db->queryNoStmt($query);

        if ($result) {

            echo '<table class="table table-striped table-hover">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th><a class="column_sortroom" id="roomName" data-order="' . $order . '" href="#">Room Name<i class="bx bx-sort-alt-2"></i></a></th>';
            echo '<th><a class="column_sortroom" id="roomType" data-order="' . $order . '" href="#">Room Type<i class="bx bx-sort-alt-2"></i></a></th>';
            echo '<th><a class="column_sortroom" id="roomRate" data-order="' . $order . '" href="#">Room Rate<i class="bx bx-sort-alt-2"></i></a></th>';
            echo '<th><a class="column_sortroom" id="ROOMtatus" data-order="' . $order . '" href="#">Room Status<i class="bx bx-sort-alt-2"></i></a></th>';
            echo '<th>Action</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody id="room_data">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['RoomID'] . '</td>';
                echo '<td>' . $row['roomName'] . '</td>';
                echo '<td>' . $row['roomType'] . '</td>';
                echo '<td>' . $row['roomRate'] . '</td>';
                echo '<td>' . $row['ROOMtatus'] . '</td>';
                echo '<td>';
                echo '<div class="d-flex">';
                echo '<a href="#viewRoomModal" class="m-1 view" data-toggle="modal" onclick="viewRoom(' . $row['RoomID'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
                echo '<a href="#editRoomModal" class="m-1 edit" data-toggle="modal" onclick="viewRoom(' . $row['RoomID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>';
                echo '<a href="#deleteRoomModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['RoomID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo 'Error executing SQL query: ' . $db->getError();
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

        $query = "SELECT BOOKING.BookingID, CUSTOMER.customerFirstName, CUSTOMER.customerLastName, ROOM.RoomID, ROOM.roomName, BOOKING.checkinDate, BOOKING.checkOutDate, BOOKING.paymentStatus
        FROM BOOKING
        JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
        JOIN CUSTOMER ON BOOKING.customerID = CUSTOMER.customerID
        ORDER BY " . $_GET["column_name"] . " " . $_GET["order"];
        $result = $db->queryNoStmt($query);

        if ($result) {

            echo '<table class="table table-striped table-hover">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>First Name</th>';
            echo '<th>Last Name</th>';
            echo '<th><a class="column_sortbooking" id="RoomID" data-order="' . $order . '" href="#">Room ID<i class="bx bx-sort-alt-2"></i></a></th>';
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
                echo '<td>' . $row['BookingID'] . '</td>';
                echo '<td>' . $row['customerFirstName'] . '</td>';
                echo '<td>' . $row['customerLastName'] . '</td>';
                echo '<td>' . $row['RoomID'] . '</td>';
                echo '<td>' . $row['roomName'] . '</td>';
                echo '<td>' . $row['checkinDate'] . '</td>';
                // echo '<td>' . $row['checkOutDate'] . '</td>';
                echo '<td>' . $row['paymentStatus'] . '</td>';
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
            echo '</tbody>';
            echo '</table>';
        } else {
            echo 'Error executing SQL query: ' . $db->getError();
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

        $sql = "SELECT * FROM ROOM 
                WHERE RoomID LIKE '%" . $searchQuery . "%'
                OR  roomName LIKE '%" . $searchQuery . "%'
                OR  roomType LIKE '%" . $searchQuery . "%'
                OR  roomRate LIKE '%" . $searchQuery . "%'
                OR  ROOMtatus LIKE '%" . $searchQuery . "%'";

        $result = $db->queryNoStmt($sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['RoomID'] . '</td>';
                echo '<td>' . $row['roomName'] . '</td>';
                echo '<td>' . $row['roomType'] . '</td>';
                echo '<td>' . $row['roomRate'] . '</td>';
                echo '<td>' . $row['ROOMtatus'] . '</td>';
                echo '<td>';
                echo '<div class="d-flex">';
                echo '<a href="#viewRoomModal" class="m-1 view" data-toggle="modal" onclick="viewRoom(' . $row['RoomID'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
                echo '<a href="#editRoomModal" class="m-1 edit" data-toggle="modal" onclick="viewRoom(' . $row['RoomID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>';
                echo '<a href="#deleteRoomModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['RoomID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo 'Error executing SQL query: ' . $db->getError();
        }
        break;
    case 'booking':
        // Get values from the GET parameters
        $searchQuery = $_GET['searchQuery'];

        $sql = "SELECT BOOKING.BookingID, CUSTOMER.customerFirstName, CUSTOMER.customerLastName, ROOM.RoomID, ROOM.roomName, BOOKING.checkinDate, BOOKING.checkOutDate, BOOKING.paymentStatus
        FROM BOOKING
        JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
        JOIN CUSTOMER ON BOOKING.customerID = CUSTOMER.customerID
        WHERE customerFirstName LIKE '%" . $searchQuery . "%'
            OR customerLastName LIKE '%" . $searchQuery . "%'
            OR ROOM.RoomID LIKE '%" . $searchQuery . "%'
            OR ROOM.roomName LIKE '%" . $searchQuery . "%'";

        $result = $db->queryNoStmt($sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['BookingID'] . '</td>';
                echo '<td>' . $row['customerFirstName'] . '</td>';
                echo '<td>' . $row['customerLastName'] . '</td>';
                echo '<td>' . $row['RoomID'] . '</td>';
                echo '<td>' . $row['roomName'] . '</td>';
                echo '<td>' . $row['checkinDate'] . '</td>';
                // echo '<td>' . $row['checkOutDate'] . '</td>';
                echo '<td>' . $row['paymentStatus'] . '</td>';
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
