<?php
function listMessage($db)
{
    $sql = "SELECT * FROM MESSAGE";
    $result = $db->queryNoStmt($sql);
    if ($result) {
        $html = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>';
            $html .= '<td>' . $row['MessageID'] . '</td>';
            $html .= '<td>' . $row['Sender'] . '</td>';
            $html .= '<td>' . $row['Subject'] . '</td>';
            $html .= '<td>' . $row['Content'] . '</td>';
            $html .= '<td>' . $row['Timestamp'] . '</td>';
            $html .= '<td>';
            $html .= '<div class="d-flex">';
            $html .= '<a href="#viewMessageModal" class="m-1 view" data-toggle="modal" onclick="viewMessage(' . $row['MessageID'] . ')">
                        <i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i>
                    </a>';
            $html .= '<a href="#sendModal" class="m-1 delete" data-toggle="modal" onclick="viewMessage(' . $row['MessageID'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Send">forward_to_inbox</i>
                    </a>';
            $html .= '<a href="#deleteMessageModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['MessageID'] . ')">
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

function deleteMessage($db, $id)
{
    $sql = "DELETE FROM  MESSAGE WHERE MessageID  = '$id' ";

    if ($db->queryNoStmt($sql)) {
        return "Record deleted successfully";
    } else {
        return "Error deleting record: " . $db->getError();
    }
    $db->close();
}

function viewMessage($db, $id)
{
    $sql = "SELECT * FROM MESSAGE WHERE MessageID = '$id'";
    $result = $db->queryNoStmt($sql);
    if ($result) {
        $messageData = mysqli_fetch_assoc($result);
        // Return customer data as JSON
        $jsonData = json_encode($messageData);
        return $jsonData;
    } else {
        // Handle the error if needed
        return 'Error executing SQL query: ' . $db->getError();
    }
}
