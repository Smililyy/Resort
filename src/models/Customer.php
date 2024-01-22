<?php
function listCustomer($db)
{
    $sql = "SELECT * FROM CUSTOMER";
    $result = $db->queryNoStmt($sql);
    if ($result) {
        $html = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>';
            $html .= '<td>' . $row['CustomerID'] . '</td>';
            $html .= '<td>' . $row['CustomerFirstName'] . '</td>';
            $html .= '<td>' . $row['CustomerLastName'] . '</td>';
            $html .= '<td>' . $row['CustomerDob'] . '</td>';
            $html .= '<td>' . $row['CustomerEmail'] . '</td>';
            $html .= '<td>' . $row['CustomerPhoneNumber'] . '</td>';
            $html .= '<td>' . $row['CustomerAddress'] . '</td>';
            $html .= '<td><div class="d-flex">';
            $html .= '<a href="#viewCustomerModal" class="m-1 view" data-toggle="modal" onclick="viewCustomer(' . $row['CustomerID'] . ')"><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
            $html .= '<a href="#editCustomerModal" class="m-1 edit" data-toggle="modal" onclick=viewCustomer("' . $row['CustomerID'] . '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
            $html .= '<a href="#deleteCustomerModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['CustomerID'] . ')"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
            $html .= '</div></td>';
            $html .= '</tr>';
        }
        return $html;
    } else {
        return 'Error executing SQL query: ' . $db->getError();
    }
    $db->close();
}

function deleteCustomer($db, $id)
{
    $sql = "DELETE FROM  CUSTOMER WHERE CustomerID  = '$id' ";
    if ($db->queryNoStmt($sql)) {
        return "Record deleted successfully";
    } else {
        return "Error deleting record: " . $db->getError();
    }
    $db->close();
}

function viewCustomer($db, $id)
{
    $sql = "SELECT * FROM CUSTOMER WHERE CustomerID = '$id'";
    $result = $db->queryNoStmt($sql);

    if ($result) {
        $customerData = mysqli_fetch_assoc($result);
        echo json_encode($customerData);
    } else {
        // Handle the error if needed
        return 'Error executing SQL query: ' . $db->getError();
    }
    $db->close();
}

function getAvgCustomer($db)
{
    $sqlAvgCustomer = "SELECT FORMAT(AVG(Amount), 0) AS AvgCustomer FROM INVOICE";
    $resultAvgCustomer = $db->queryNoStmt($sqlAvgCustomer);
    return $resultAvgCustomer;
    $db->close();
}


function getTotalCustomer($db)
{
    $sqlTotalCustomer = "SELECT FORMAT(COUNT(*), 0) AS TotalCustomer FROM CUSTOMER";
    $resultTotalCustomer = $db->queryNoStmt($sqlTotalCustomer);
    return $resultTotalCustomer;
    $db->close();
}

function addCustomer(
    $db,
    $firstName,
    $lastName,
    $dob,
    $address,
    $phoneNumber,
    $email
) {
    $sql = "INSERT INTO CUSTOMER (CustomerFirstName, CustomerLastName, CustomerDob, CustomerAddress, CustomerPhoneNumber, CustomerEmail) 
        VALUES ('" . $firstName . "', '" . $lastName . "', '" . $dob . "', '" . $address . "', '" . $phoneNumber . "', '" . $email . "')";
    $result = $db->queryNoStmt($sql);

    if ($result) {
        return "Customer added successfully!";
    } else {
        return "Error adding customer: " . $db->getError();
    }
    // Close the database connection
    $db->close();
}

function editCustomer(
    $db,
    $CustomerID,
    $firstname,
    $lastname,
    $dob,
    $email,
    $phone,
    $address
) {
    $sql = "UPDATE CUSTOMER 
        SET 
            CustomerFirstName='" . $firstname . "',
            CustomerLastName='" . $lastname . "',
            CustomerDob='" . $dob . "',
            CustomerAddress='" . $address . "',
            CustomerPhoneNumber='" . $phone . "',
            CustomerEmail='" . $email . "'
        WHERE CustomerID = '" . $CustomerID . "'";

    // Execute the query
    $result = $db->queryNoStmt($sql);
    // Check for errors
    if ($result) {
        return "Update successful!";
    } else {
        return "Error updating record: " . $db->getError();
    }
    $db->close();
}

function sortCustomer($db, $column_name, $order)
{
    if ($order == 'desc') {
        $order = 'asc';
    } else {
        $order = 'desc';
    }
    $query = "SELECT * FROM CUSTOMER ORDER BY " . $column_name . " " . $order;
    $result = $db->queryNoStmt($query);

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
            $html .= '<td>' . $row['CustomerID'] . '</td>';
            $html .= '<td>' . $row['CustomerFirstName'] . '</td>';
            $html .= '<td>' . $row['CustomerLastName'] . '</td>';
            $html .= '<td>' . $row['CustomerDob'] . '</td>';
            $html .= '<td>' . $row['CustomerEmail'] . '</td>';
            $html .= '<td>' . $row['CustomerPhoneNumber'] . '</td>';
            $html .= '<td>' . $row['CustomerAddress'] . '</td>';
            $html .= '<td><div class="d-flex">';
            $html .= '<a href="#viewCustomerModal" class="m-1 view" data-toggle="modal" onclick="viewCustomer(' . $row['CustomerID'] . ')"><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
            $html .= '<a href="#editCustomerModal" class="m-1 edit" data-toggle="modal" onclick=viewCustomer("' . $row['CustomerID'] . '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
            $html .= '<a href="#deleteCustomerModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['CustomerID'] . ')"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
            $html .= '</div></td>';
            $html .= '</tr>';
        }

        $html .= '</tbody>';
        $html .= '</table>';
        // Echo the generated HTML
        return $html;
    } else {
        return 'Error executing SQL query: ' . $db->getError();
    }
    $db->close();
}

function searchCustomer($db, $searchQuery)
{
    $sql = "SELECT * FROM CUSTOMER 
            WHERE CustomerFirstName LIKE '%" . $searchQuery . "%'
            OR CustomerLastName LIKE '%" . $searchQuery . "%'
            OR CustomerDob LIKE '%" . $searchQuery . "%'
            OR CustomerEmail LIKE '%" . $searchQuery . "%'
            OR CustomerPhoneNumber LIKE '%" . $searchQuery . "%'
            OR CustomerAddress LIKE '%" . $searchQuery . "%'";
    $result = $db->queryNoStmt($sql);

    if ($result) {
        $html = ''; // Variable to store the generated HTML
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>';
            $html .= '<td>' . $row['CustomerID'] . '</td>';
            $html .= '<td>' . $row['CustomerFirstName'] . '</td>';
            $html .= '<td>' . $row['CustomerLastName'] . '</td>';
            $html .= '<td>' . $row['CustomerDob'] . '</td>';
            $html .= '<td>' . $row['CustomerEmail'] . '</td>';
            $html .= '<td>' . $row['CustomerPhoneNumber'] . '</td>';
            $html .= '<td>' . $row['CustomerAddress'] . '</td>';
            $html .= '<td><div class="d-flex">';
            $html .= '<a href="#viewCustomerModal" class="m-1 view" data-toggle="modal" onclick="viewCustomer(' . $row['CustomerID'] . ')"><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
            $html .= '<a href="#editCustomerModal" class="m-1 edit" data-toggle="modal" onclick=viewCustomer("' . $row['CustomerID'] . '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
            $html .= '<a href="#deleteCustomerModal" class="m-1 delete" data-toggle="modal" onclick="prepareAction(' . $row['CustomerID'] . ')"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
            $html .= '</div></td>';
            $html .= '</tr>';
        }
        return $html;
    } else {
        return 'Error executing SQL query: ' . $db->getError();
    }
    $db->close();
}
