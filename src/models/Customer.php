<?php

require '../inc/Database.php';

function listCustomers($db)
{
    $sql = "SELECT * FROM customers";
    $result = $db->queryNoStmt($sql);
    if ($result) {
        $html = '';
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
        return $html;
    } else {
        return 'Error executing SQL query: ' . $db->getError();
    }
    $db->close();
}

function deleteCustomer($db, $id)
{
    $sql = "DELETE FROM  customers WHERE customerID  = '$id' ";
    if ($db->queryNoStmt($sql)) {
        return "Record deleted successfully";
    } else {
        return "Error deleting record: " . $db->getError();
    }
    $db->close();
}

function viewCustomer($db, $id)
{
    $sql = "SELECT * FROM customers WHERE customerID = '$id'";
    $result = $db->queryNoStmt($sql);

    if ($result) {
        $customerData = mysqli_fetch_assoc($result);
        return json_encode($customerData);
    } else {
        // Handle the error if needed
        return 'Error executing SQL query: ' . $db->getError();
    }
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
    $sql = "INSERT INTO customers (customerFirstName, customerLastName, customerDob, customerAddress, customerPhoneNumber, customerEmail) 
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
    $customerid,
    $firstname,
    $lastname,
    $dob,
    $email,
    $phone,
    $address
) {
    $sql = "UPDATE customers 
        SET 
            customerFirstName='" . $firstname . "',
            customerLastName='" . $lastname . "',
            customerDob='" . $dob . "',
            customerAddress='" . $address . "',
            customerPhoneNumber='" . $phone . "',
            customerEmail='" . $email . "'
        WHERE customerID = '" . $customerid . "'";

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
    $query = "SELECT * FROM customers ORDER BY " . $column_name . " " . $order;
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
        return $html;
    } else {
        return 'Error executing SQL query: ' . $db->getError();
    }
    $db->close();
}

function searchCustomer($db, $searchQuery)
{
    $sql = "SELECT * FROM customers 
            WHERE customerFirstName LIKE '%" . $searchQuery . "%'
            OR customerLastName LIKE '%" . $searchQuery . "%'
            OR customerDob LIKE '%" . $searchQuery . "%'
            OR customerEmail LIKE '%" . $searchQuery . "%'
            OR customerPhoneNumber LIKE '%" . $searchQuery . "%'
            OR customerAddress LIKE '%" . $searchQuery . "%'";
    $result = $db->queryNoStmt($sql);

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
        return $html;
    } else {
        return 'Error executing SQL query: ' . $db->getError();
    }
    $db->close();
}
