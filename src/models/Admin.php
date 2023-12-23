<?php
include "../controllers/inc/db_config.php";

$action = isset($_GET['action']) ? $_GET['action'] : '';

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
                echo '<td>' . $row['checkOutDate'] . '</td>';
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
            echo '<th><a class="column_sortbooking" id="checkOutDate" data-order="' . $order . '" href="#">Check Out Date<i class="bx bx-sort-alt-2"></i></a></th>';
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
                echo '<td>' . $row['checkOutDate'] . '</td>';
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
    default:
        //  echo"can't reach";
    break;
} 



