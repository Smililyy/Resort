<?php
include "../controllers/inc/db_config.php";

$action = isset($_GET['action']) ? $_GET['action'] : '';

require '../../vendor/PHPMailer/src/Exception.php';
require '../../vendor/PHPMailer/src/SMTP.php';
require '../../vendor/PHPMailer/src/PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
switch ($action) {
    case 'listcustomer':
        $sql = "SELECT * FROM customers";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $html = ''; // Variable to store the generated HTML

            while ($row = mysqli_fetch_assoc($result)) {
                $html .= '<tr>';
                $html .= '<td>' . $row['customerID'] . '</td>';
                $html .= '<td>' . $row['customerFirstName'] . '</td>';
                $html .= '<td>' . $row['customerLastName'] . '</td>';
                $html .= '<td>' . $row['customerDob'] . '</td>';
                $html .= '<td>' . $row['customerEmail'] . '</td>';
                $html .= '<td>' . $row['customerPhoneNumber'] . '</td>';
                $html .= '<td>' . $row['customerAddress'] . '</td>';
                $html .= '<td><div class="d-flex">';
                $html .= '<a href="#viewCustomerModal" class="m-1 view" data-toggle="modal" onclick="viewCustomer(' . $row['customerID'] . ')"><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
                $html .= '<a href="#editCustomerModal" class="m-1 edit" data-toggle="modal" onclick=viewCustomer("' . $row['customerID'] . '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                $html .= '<a href="#deleteCustomerModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['customerID'] . ')"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                $html .= '</div></td>';
                $html .= '</tr>';
            }

            // Echo the generated HTML
            echo $html;
        } else {
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }
    break;

    case 'listbooking':
        $sql = "SELECT bookings.bookingID, customers.customerFirstName, customers.customerLastName, rooms.roomID, rooms.roomName, bookings.checkinDate, bookings.checkOutDate, bookings.paymentStatus
        FROM bookings
        JOIN rooms ON bookings.roomID = rooms.roomID
        JOIN customers ON bookings.customerID = customers.customerID";

        $result = mysqli_query($con, $sql);
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
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }
    break;
    case 'listroom':
        $sql = "SELECT * FROM rooms";
        $result = mysqli_query($con, $sql);
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
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }
    break;
    case 'listmessage':
        $sql = "SELECT * FROM messages";
        $result = mysqli_query($con, $sql);
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
                echo '<a href="#deleteMessageModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' .$row['idMessage'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
            
        } else {
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }
    break;
    case 'listinvoice':
        $sql = "SELECT * FROM invoices";
        $result = mysqli_query($con, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td><input type="checkbox" name="" id=""></td>';
                echo '<td>' . $row['invoicelD'] . '</td>';
                echo '<td>' . $row['bookingID'] . '</td>';
                echo '<td>' . $row['paymentDate'] . '</td>';
                echo '<td>' . $row['amount'] . '</td>';
                echo '<td>';
                echo '<div class="d-flex">'; 
                echo '<a href="#viewInvoiceModal" class="m-1 view" data-toggle="modal" onclick="viewInvoice(' . $row['invoicelD'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Print">print</i>
                    </a>';                     
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
            
        } else {
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }
    break;
    case 'listbill':
        $id =$_GET['idinvoice'];  
        $sql = "SELECT
                    rooms.roomName,
                    rooms.roomRate,
                    TIMESTAMPDIFF(DAY, bookings.checkinDate, bookings.checkOutDate) AS duration,
                    invoices.amount
                    FROM
                        rooms
                    JOIN bookings ON rooms.roomID = bookings.roomID
                    JOIN invoices ON bookings.bookingID = invoices.bookingID
                WHERE invoices.invoicelD = '$id';";

        $result = mysqli_query($con, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['roomName'] . '</td>';
                echo '<td class="text-center">' . $row['roomRate'] . '</td>';
                echo '<td class="text-center">' . $row['duration'] . '</td>';
                echo '<td>' . $row['amount'] . '</td>';
                echo '</tr>';
            }
            
        } else {
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }
    break;
    case 'deleteCustomer':
        $id =$_GET['idcustomer'];  
        $sql= "DELETE FROM  customers WHERE customerID  = '$id' " ; 

        if (mysqli_query($con, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    break;
    case 'deleteBooking':
        $id =$_GET['idbooking'];  
        $sql= "DELETE FROM  bookings WHERE bookingID  = '$id' " ; 

        if (mysqli_query($con, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    break;
    case 'deleteRoom':
        $id =$_GET['idroom'];  
        $sql= "DELETE FROM  rooms WHERE roomID  = '$id' " ; 

        if (mysqli_query($con, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    break;
    case 'deleteMessage':
        $id =$_GET['idmessage'];  
        $sql= "DELETE FROM  messages WHERE idMessage  = '$id' " ; 

        if (mysqli_query($con, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    break;
    case 'viewCustomer':
        $id =$_GET['idcustomer'];  
        $sql = "SELECT * FROM customers WHERE customerID = '$id'";
        $result = mysqli_query($con, $sql);
    
        if ($result) {
            $customerData = mysqli_fetch_assoc($result);
    
            // Return customer data as JSON
            echo json_encode($customerData);
        } else {
            // Handle the error if needed
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }
        
    break;
    case 'viewRoom':
        $id =$_GET['idroom'];  
        $sql = "SELECT * FROM rooms WHERE roomID = '$id'";
        $result = mysqli_query($con, $sql);
    
        if ($result) {
            $roomData = mysqli_fetch_assoc($result);
    
            // Return customer data as JSON
            echo json_encode($roomData);
        } else {
            // Handle the error if needed
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }
        
    break;
    case 'viewBooking':
        $id =$_GET['idbooking'];  
        $sql = "SELECT bookings.bookingID, customers.customerFirstName, customers.customerLastName, rooms.roomID, rooms.roomName, bookings.checkinDate, bookings.checkOutDate, bookings.paymentStatus,  bookings.totalAmount, bookings.numberOfCustomer, bookings.message
        FROM bookings
        JOIN rooms ON bookings.roomID = rooms.roomID
        JOIN customers ON bookings.customerID = customers.customerID
        WHERE bookingID = '$id'";
        $result = mysqli_query($con, $sql);
    
        if ($result) {
            $BookingData = mysqli_fetch_assoc($result);
    
            // Return customer data as JSON
            echo json_encode($BookingData);
        } else {
            // Handle the error if needed
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }
        
    break;
    case 'viewMessage':
        $id =$_GET['idmessage'];  
        $sql = "SELECT * FROM messages WHERE idMessage = '$id'";
        $result = mysqli_query($con, $sql);
    
        if ($result) {
            $messageData = mysqli_fetch_assoc($result);
    
            // Return customer data as JSON
            echo json_encode($messageData);
        } else {
            // Handle the error if needed
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }
        
    break;
    case 'viewInvoice':
        $id =$_GET['idinvoice'];  
        $sql = "SELECT invoices.invoicelD, customers.customerAddress, customers.customerFirstName, customers.customerLastName
                FROM invoices
                JOIN bookings ON invoices.bookingID = bookings.bookingID
                JOIN customers ON bookings.customerID = customers.customerID
                WHERE invoicelD = '$id'";
        $result = mysqli_query($con, $sql);
    
        if ($result) {
            $invoiceData = mysqli_fetch_assoc($result);
    
            // Return customer data as JSON
            echo json_encode($invoiceData);
        } else {
            // Handle the error if needed
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }
        
    break;
    case 'addCustomer':
        $firstName = $_GET['firstName'];
        $lastName = $_GET['lastName'];
        $dob = $_GET['dob'];
        $email = $_GET['email'];
        $phoneNumber = $_GET['phoneNumber'];
        $address = $_GET['address'];
        $sql = "INSERT INTO customers (customerFirstName, customerLastName, customerDob, customerAddress, customerPhoneNumber, customerEmail) 
        VALUES ('".$firstName."', '".$lastName."', '".$dob."', '".$address."', '".$phoneNumber."', '".$email."')";
        // echo $sql;
        // die();
        // Execute the query
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "Customer added successfully!";
        } else {
            echo "Error adding customer: " . mysqli_error($con);
        }

        // Close the database connection
        mysqli_close($con);    
    break;
    case 'addRoom':
        $roomname = $_GET['roomname'];
        $roomtype = $_GET['roomtype'];
        $roomrate = $_GET['roomrate'];
        $roomstatus = $_GET['roomstatus'];
        $sql = "INSERT INTO rooms (roomType, roomRate, roomStatus, roomName) 
        VALUES ('".$roomtype."', '".$roomrate."', '".$roomstatus."', '".$roomname."')";
        // echo $sql;
        // die();
        // Execute the query
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "Room added successfully!";
        } else {
            echo "Error adding customer: " . mysqli_error($con);
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

        $sqlUpdateRoomStatus = "UPDATE rooms SET roomStatus = 'Reserved' WHERE roomID = '".$roomid."'";
        $resultUpdateRoomStatus = mysqli_query($con, $sqlUpdateRoomStatus);

        if (!$resultUpdateRoomStatus) {
            throw new Exception("Error updating room status: " . mysqli_error($con));
        }
    
        // Get room rate
        $sqlGetRoomRate = "SELECT roomRate FROM rooms WHERE roomID = '".$roomid."'";
        $resultGetRoomRate = mysqli_query($con, $sqlGetRoomRate);
    
        if (!$resultGetRoomRate) {
            throw new Exception("Error getting room rate: " . mysqli_error($con));
        }
    
        $row = mysqli_fetch_assoc($resultGetRoomRate);
        $room_rate = $row['roomRate'];
    
        // Insert booking
        $sqlInsertBooking = "INSERT INTO bookings (customerID, roomID, checkinDate, checkOutDate, totalAmount, paymentStatus, numberOfCustomer) 
                            VALUES ('".$customerID."','".$roomid."','".$checkindate."','".$checkoutdate."','".$room_rate."','". $paymentstatus."','".$guests."')";
        $resultInsertBooking = mysqli_query($con, $sqlInsertBooking);
    
        if ($resultInsertBooking) {
            echo "Booking added successfully!";
        } else {
            echo "Error adding customer: " . mysqli_error($con);
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
        
        $sql = "UPDATE bookings 
                JOIN rooms ON bookings.roomID = rooms.roomID
                SET 
                bookings.roomID= '".$roomid."', 
                checkinDate = '".$checkindate."', 
                checkOutDate = '".$checkoutdate."', 
                paymentStatus = '".$paymentstatus."', 
                numberOfCustomer = '".$guests."', 
                message = '".$message."' 
                WHERE bookings.bookingID = '".$bookingid."'";

        // Execute the query
        $result = mysqli_query($con, $sql);

        // Check for errors
        if ($result) {
            // Query executed successfully
            echo "Update successful!";
        } else {
            // Query failed
            echo "Error updating record: " . mysqli_error($con);
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
        
        $sql = "UPDATE customers 
            SET 
                customerFirstName='".$firstname."',
                customerLastName='".$lastname."',
                customerDob='".$dob."',
                customerAddress='".$address."',
                customerPhoneNumber='".$phone."',
                customerEmail='".$email."'
            WHERE customerID = '".$customerid."'";

        // Execute the query
        $result = mysqli_query($con, $sql);

        // Check for errors
        if ($result) {
            // Query executed successfully
            echo "Update successful!";
        } else {
            // Query failed
            echo "Error updating record: " . mysqli_error($con);
        }
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
                    roomType = '".$roomtype."' ,
                    roomRate = '".$roomrate."' ,
                    roomStatus = '".$roomstatus."' ,
                    roomName = '".$roomname."' 
                WHERE roomID = '". $roomid."'";
        // Execute the query
        $result = mysqli_query($con, $sql);

        // Check for errors
        if ($result) {
            // Query executed successfully
            echo "Update successful!";
        } else {
            // Query failed
            echo "Error updating record: " . mysqli_error($con);
        }
    break;
    case 'sortcustomer':
        $column_name = $_GET['column_name'];
        $order = $_GET["order"];
        
        if ($order == 'desc') {
            $order = 'asc';
        } else {
            $order = 'desc';
        }
        
        $query = "SELECT * FROM customers ORDER BY " . $_GET["column_name"] . " " . $_GET["order"];
        $result = mysqli_query($con, $query);
        
        if ($result) {
            $html = ''; // Variable to store the generated HTML
            $html .= '<table class="table table-striped table-hover">';
            $html .= '<thead>';
            $html .= '<tr>';
            $html .= '<th>ID</th>';
            $html .= '<th><a class="column_sortcustomer" id="customerFirstName" data-order="' . $order . '" href="#">First Name<i class="bx bx-sort-alt-2"></i></a></th>';
            $html .= '<th><a class="column_sortcustomer" id="customerLastName" data-order="' . $order . '" href="#">Last Name<i class="bx bx-sort-alt-2"></i></a></th>';
            $html .= '<th>Date of Birth</th>';
            $html .= '<th>Email</th>';
            $html .= '<th>Phone Number</th>';
            $html .= '<th>Address</th>';
            $html .= '<th>Action</th>';
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody id="customer_data">';
        
            while ($row = mysqli_fetch_assoc($result)) {
                $html .= '<tr>';
                $html .= '<td>' . $row['customerID'] . '</td>';
                $html .= '<td>' . $row['customerFirstName'] . '</td>';
                $html .= '<td>' . $row['customerLastName'] . '</td>';
                $html .= '<td>' . $row['customerDob'] . '</td>';
                $html .= '<td>' . $row['customerEmail'] . '</td>';
                $html .= '<td>' . $row['customerPhoneNumber'] . '</td>';
                $html .= '<td>' . $row['customerAddress'] . '</td>';
                $html .= '<td><div class="d-flex">';
                $html .= '<a href="#viewCustomerModal" class="m-1 view" data-toggle="modal" onclick="viewCustomer(' . $row['customerID'] . ')"><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
                $html .= '<a href="#editCustomerModal" class="m-1 edit" data-toggle="modal" onclick=viewCustomer("' . $row['customerID'] . '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                $html .= '<a href="#deleteCustomerModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['customerID'] . ')"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                $html .= '</div></td>';
                $html .= '</tr>';
            }
        
            $html .= '</tbody>';
            $html .= '</table>';
        
            // Echo the generated HTML
            echo $html;
        } else {
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }        
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
        $result = mysqli_query($con, $query);
        
        if ($result) {

            echo'<table class="table table-striped table-hover">';
            echo'<thead>';
            echo'<tr>';
            echo'<th>ID</th>';
            echo'<th><a class="column_sortroom" id="roomName" data-order="' . $order . '" href="#">Room Name<i class="bx bx-sort-alt-2"></i></a></th>';
            echo'<th><a class="column_sortroom" id="roomType" data-order="' . $order . '" href="#">Room Type<i class="bx bx-sort-alt-2"></i></a></th>';
            echo'<th><a class="column_sortroom" id="roomRate" data-order="' . $order . '" href="#">Room Rate<i class="bx bx-sort-alt-2"></i></a></th>';
            echo'<th><a class="column_sortroom" id="roomStatus" data-order="' . $order . '" href="#">Room Status<i class="bx bx-sort-alt-2"></i></a></th>';
            echo'<th>Action</th>';
            echo'</tr>';
            echo'</thead>';
            echo'<tbody id="room_data">';
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
            echo'</tbody>';
            echo'</table>';
        } else {
            echo 'Error executing SQL query: ' . mysqli_error($con);
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
        $result = mysqli_query($con, $query);
        
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
            echo'</tbody>';
            echo'</table>';
        } else {
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }   
    break;
    case 'customer':
        // Get values from the GET parameters
        $searchQuery = $_GET['searchQuery'];
        
        $sql = "SELECT * FROM customers 
                WHERE customerFirstName LIKE '%" .$searchQuery. "%'
                OR customerLastName LIKE '%" .$searchQuery. "%'
                OR customerDob LIKE '%" .$searchQuery. "%'
                OR customerEmail LIKE '%" .$searchQuery. "%'
                OR customerPhoneNumber LIKE '%" .$searchQuery. "%'
                OR customerAddress LIKE '%" .$searchQuery. "%'";

        $result = mysqli_query($con, $sql);

        if ($result) {
            $html = ''; // Variable to store the generated HTML

            while ($row = mysqli_fetch_assoc($result)) {
                $html .= '<tr>';
                $html .= '<td>' . $row['customerID'] . '</td>';
                $html .= '<td>' . $row['customerFirstName'] . '</td>';
                $html .= '<td>' . $row['customerLastName'] . '</td>';
                $html .= '<td>' . $row['customerDob'] . '</td>';
                $html .= '<td>' . $row['customerEmail'] . '</td>';
                $html .= '<td>' . $row['customerPhoneNumber'] . '</td>';
                $html .= '<td>' . $row['customerAddress'] . '</td>';
                $html .= '<td><div class="d-flex">';
                $html .= '<a href="#viewCustomerModal" class="m-1 view" data-toggle="modal" onclick="viewCustomer(' . $row['customerID'] . ')"><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
                $html .= '<a href="#editCustomerModal" class="m-1 edit" data-toggle="modal" onclick=viewCustomer("' . $row['customerID'] . '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                $html .= '<a href="#deleteCustomerModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['customerID'] . ')"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                $html .= '</div></td>';
                $html .= '</tr>';
            }

            // Echo the generated HTML
            echo $html;
        } else {
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }
    break;
    case 'room':
        // Get values from the GET parameters
        $searchQuery = $_GET['searchQuery'];
        
        $sql = "SELECT * FROM rooms 
                WHERE roomID LIKE '%" .$searchQuery. "%'
                OR  roomName LIKE '%" .$searchQuery. "%'
                OR  roomType LIKE '%" .$searchQuery. "%'
                OR  roomRate LIKE '%" .$searchQuery. "%'
                OR  roomStatus LIKE '%" .$searchQuery. "%'";

        $result = mysqli_query($con, $sql);
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
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }
    break;
    case 'booking':
        // Get values from the GET parameters
        $searchQuery = $_GET['searchQuery'];
        
        $sql = "SELECT * FROM bookings 
                WHERE roomName LIKE '%" .$searchQuery. "%'";

        $sql = "SELECT bookings.bookingID, customers.customerFirstName, customers.customerLastName, rooms.roomID, rooms.roomName, bookings.checkinDate, bookings.checkOutDate, bookings.paymentStatus
        FROM bookings
        JOIN rooms ON bookings.roomID = rooms.roomID
        JOIN customers ON bookings.customerID = customers.customerID
        WHERE customerFirstName LIKE '%" .$searchQuery. "%'
            OR customerLastName LIKE '%" .$searchQuery. "%'
            OR rooms.roomID LIKE '%" .$searchQuery. "%'
            OR rooms.roomName LIKE '%" .$searchQuery. "%'";

        $result = mysqli_query($con, $sql);
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
            echo 'Error executing SQL query: ' . mysqli_error($con);
        }
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
            $mail->setFrom('santelacuisine@gmail.com','SaiGon Hotel');
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



