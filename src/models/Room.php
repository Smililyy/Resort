<?php
function listRoom($db)
{
    $sql = "SELECT * FROM ROOM";
    $result = $db->queryNoStmt($sql);
    if ($result) {
        $html = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>';
            $html .= '<td>' . $row['RoomID'] . '</td>';
            $html .= '<td>' . $row['RoomName'] . '</td>';
            $html .= '<td>' . $row['RoomType'] . '</td>';
            $html .= '<td>' . $row['RoomRate'] . '</td>';
            $html .= '<td>' . $row['RoomStatus'] . '</td>';
            $html .= '<td>';
            $html .= '<div class="d-flex">';
            $html .= '<a href="#viewRoomModal" class="m-1 view" data-toggle="modal" onclick="viewRoom(' . $row['RoomID'] . ')">
                    <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                </a>';
            $html .= '<a href="#editRoomModal" class="m-1 edit" data-toggle="modal" onclick="viewRoom(' . $row['RoomID'] . ')">
                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                </a>';
            $html .= '<a href="#deleteRoomModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['RoomID'] . ')">
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
    $db->close();
}

function listBill($db, $id)
{
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
        $html = '';
        while ($row = mysqli_fetch_assoc($result)) {
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
            $html .= '<tr>';
            $html .= '<td>' . $row['RoomName'] . '</td>';
            $html .= '<td class="text-center">' . $row['RoomRate'] . ' $</td>';
            $html .= '<td class="text-center">' . $row['duration'] . ' days</td>';
            $html .= '<td>' . $row['Amount'] . ' $</td>';
            $html .= '</tr>';
        }
        return $html;
    } else {
        return 'Error executing SQL query: ' . $db->getError();
    }
    $db->close();
}
function deleteRoom($db, $id)
{
    $sql = "DELETE FROM ROOM WHERE RoomID  = '$id' ";

    if ($db->queryNoStmt($sql)) {
        return "Record deleted successfully";
    } else {
        return "Error deleting record: " . $db->getError();
    }
    $db->close();
}

function viewRoom($db, $id)
{
    $sql = "SELECT * FROM ROOM WHERE RoomID = '$id'";
    $result = $db->queryNoStmt($sql);
    if ($result) {
        $roomData = mysqli_fetch_assoc($result);
        $jsonData = json_encode($roomData);
        return  $jsonData;
    } else {
        return 'Error executing SQL query: ' . $db->getError();
    }
    $db->close();
}

function getAvgRoom($db)
{
    $sqlAvgRoom = "SELECT FORMAT(AVG(INVOICE.Amount), 0) AS AvgRoom
    FROM INVOICE
    JOIN BOOKING ON INVOICE.BookingID = BOOKING.BookingID
    JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
    WHERE ROOM.RoomType = 'Suite Room'";
    $resultAvgRoom = $db->queryNoStmt($sqlAvgRoom);
    return $resultAvgRoom;
    $db->close();
}

function getAvgMeetingEvent($db)
{
    $sqlAvgMeetingEvent = "SELECT FORMAT(AVG(INVOICE.Amount), 0) AS AvgMeetingEvent
    FROM INVOICE
    JOIN BOOKING ON INVOICE.BookingID = BOOKING.BookingID
    JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
    WHERE ROOM.RoomType = 'Event Meeting'";
    $resultAvgMeetingEvent = $db->queryNoStmt($sqlAvgMeetingEvent);
    return $resultAvgMeetingEvent;
    $db->close();
}

function getAvgResBar($db)
{
    $sqlAvgResBar = "SELECT FORMAT(AVG(INVOICE.Amount), 0) AS AvgResBar
                            FROM INVOICE
                            JOIN BOOKING ON INVOICE.BookingID = BOOKING.BookingID
                            JOIN ROOM ON BOOKING.RoomID = ROOM.RoomID
                            WHERE ROOM.RoomType = 'Restaurant and Bar'";
    $resultAvgResBar = $db->queryNoStmt($sqlAvgResBar);
    return $resultAvgResBar;
    $db->close();
}

function addRoom(
    $db,
    $roomname,
    $roomtype,
    $roomrate,
    $ROOMtatus,
) {
    $sql = "INSERT INTO ROOM (roomType, roomRate, ROOMtatus, roomName) 
        VALUES ('" . $roomtype . "', '" . $roomrate . "', '" . $ROOMtatus . "', '" . $roomname . "')";
    $result = $db->queryNoStmt($sql);
    if ($result) {
        return "Room added successfully!";
    } else {
        return "Error adding customer: " . $db->getError();
    }
    $db->close();
}
function updateRoomStatus($db, $RoomID)
{
    $sqlUpdateROOMtatus = "UPDATE ROOM SET Roomstatus = 'Reserved' WHERE RoomID = '" . $RoomID . "'";
    $resultUpdateROOMtatus = $db->queryNoStmt($sqlUpdateROOMtatus);
    if ($resultUpdateROOMtatus) {
        throw new Exception("Error updating room status: " . $db->getError());
    }
    $db->close();
}

function getRoomRate($db, $RoomID)
{
    $sqlGetRoomRate = "SELECT RoomRate FROM ROOM WHERE RoomID = '" . $RoomID . "'";
    $resultGetRoomRate = $db->queryNoStmt($sqlGetRoomRate);
    if (!$resultGetRoomRate) {
        throw new Exception("Error getting room rate: " . $db->getError());
    }
    $row = mysqli_fetch_assoc($resultGetRoomRate);
    $room_rate = $row['roomRate'];
    return $room_rate;
}

function editRoom(
    $db,
    $RoomID,
    $roomname,
    $roomtype,
    $roomrate,
    $ROOMtatus,
) {

    $sql = "UPDATE ROOM 
    SET 
        roomType = '" . $roomtype . "' ,
        roomRate = '" . $roomrate . "' ,
        ROOMtatus = '" . $ROOMtatus . "' ,
        roomName = '" . $roomname . "' 
    WHERE RoomID = '" . $RoomID . "'";

    $result = $db->queryNoStmt($sql);
    // Check for errors
    if ($result) {
        // Query executed successfully
        return "Update successful!";
    } else {
        // Query failed
        return "Error updating record: " . $db->getError();
    }
    $db->close();
}

function sortRoom($db, $column_name, $order)
{
    if ($order == 'desc') {
        $order = 'asc';
    } else {
        $order = 'desc';
    }

    $query = "SELECT * FROM ROOM ORDER BY " . $column_name . " " . $order;
    $result = $db->queryNoStmt($query);

    if ($result) {
        $html = '';
        $html .= '<table class="table table-striped table-hover">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>ID</th>';
        $html .= '<th><a class="column_sortroom" id="roomName" data-order="' . $order . '" href="#">Room Name<i class="bx bx-sort-alt-2"></i></a></th>';
        $html .= '<th><a class="column_sortroom" id="roomType" data-order="' . $order . '" href="#">Room Type<i class="bx bx-sort-alt-2"></i></a></th>';
        $html .= '<th><a class="column_sortroom" id="roomRate" data-order="' . $order . '" href="#">Room Rate<i class="bx bx-sort-alt-2"></i></a></th>';
        $html .= '<th><a class="column_sortroom" id="ROOMtatus" data-order="' . $order . '" href="#">Room Status<i class="bx bx-sort-alt-2"></i></a></th>';
        $html .= '<th>Action</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody id="room_data">';
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>';
            $html .= '<td>' . $row['RoomID'] . '</td>';
            $html .= '<td>' . $row['roomName'] . '</td>';
            $html .= '<td>' . $row['roomType'] . '</td>';
            $html .= '<td>' . $row['roomRate'] . '</td>';
            $html .= '<td>' . $row['ROOMtatus'] . '</td>';
            $html .= '<td>';
            $html .= '<div class="d-flex">';
            $html .= '<a href="#viewRoomModal" class="m-1 view" data-toggle="modal" onclick="viewRoom(' . $row['RoomID'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
            $html .= '<a href="#editRoomModal" class="m-1 edit" data-toggle="modal" onclick="viewRoom(' . $row['RoomID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>';
            $html .= '<a href="#deleteRoomModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['RoomID'] . ')">
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
    $db->close();
}

function searchRoom($db, $searchQuery)
{
    $sql = "SELECT * FROM ROOM 
    WHERE RoomID LIKE '%" . $searchQuery . "%'
    OR  roomName LIKE '%" . $searchQuery . "%'
    OR  roomType LIKE '%" . $searchQuery . "%'
    OR  roomRate LIKE '%" . $searchQuery . "%'
    OR  ROOMtatus LIKE '%" . $searchQuery . "%'";

    $result = $db->queryNoStmt($sql);
    if ($result) {
        $html = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>';
            $html .= '<td>' . $row['RoomID'] . '</td>';
            $html .= '<td>' . $row['roomName'] . '</td>';
            $html .= '<td>' . $row['roomType'] . '</td>';
            $html .= '<td>' . $row['roomRate'] . '</td>';
            $html .= '<td>' . $row['ROOMtatus'] . '</td>';
            $html .= '<td>';
            $html .= '<div class="d-flex">';
            $html .= '<a href="#viewRoomModal" class="m-1 view" data-toggle="modal" onclick="viewRoom(' . $row['RoomID'] . ')">
            <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
        </a>';
            $html .= '<a href="#editRoomModal" class="m-1 edit" data-toggle="modal" onclick="viewRoom(' . $row['RoomID'] . ')">
            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
        </a>';
            $html .= '<a href="#deleteRoomModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['RoomID'] . ')">
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
    $db->close();
}
