<?php

function listInvoice($db)
{
    $sql = "SELECT * FROM invoices";
    $result = $db->queryNoStmt($sql);
    if ($result) {
        $html = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>';
            $html .= '<td>' . $row['invoicelD'] . '</td>';
            $html .= '<td>' . $row['bookingID'] . '</td>';
            $html .= '<td>' . $row['paymentDate'] . '</td>';
            $html .= '<td>' . $row['amount'] . '</td>';
            $html .= '<td>';
            $html .= '<div class="d-flex">';
            $html .= '<a href="#viewInvoiceModal" class="m-1 view" data-toggle="modal" onclick="viewInvoice(' . $row['invoicelD'] . ')">
                        <i class="material-icons" data-toggle="tooltip" title="Print">print</i>
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

function viewInvoice($db, $id)
{
    $sql = "SELECT invoices.invoicelD, customers.customerAddress, customers.customerFirstName, customers.customerLastName
    FROM invoices
    JOIN bookings ON invoices.bookingID = bookings.bookingID
    JOIN customers ON bookings.customerID = customers.customerID
    WHERE invoicelD = '$id'";
    $result = $db->queryNoStmt($sql);
    if ($result) {
        $invoiceData = mysqli_fetch_assoc($result);
        // Return customer data as JSON
        return json_encode($invoiceData);
    } else {
        // Handle the error if needed
        return 'Error executing SQL query: ' . $db->getError();
    }
}

function searchInvoie($db, $searchQuery)
{

    $sql = "SELECT *
    FROM invoices
      WHERE invoicelD LIKE '%" . $searchQuery . "%'
        OR bookingID LIKE '%" . $searchQuery . "%'
        OR paymentDate LIKE '%" . $searchQuery . "%'
        OR amount LIKE '%" . $searchQuery . "%'";

    $result = $db->queryNoStmt($sql);
    if ($result) {
        $html = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>';
            $html .= '<td>' . $row['invoicelD'] . '</td>';
            $html .= '<td>' . $row['bookingID'] . '</td>';
            $html .= '<td>' . $row['paymentDate'] . '</td>';
            $html .= '<td>' . $row['amount'] . '</td>';
            $html .= '<td>';
            $html .= '<div class="d-flex">';
            $html .= '<a href="#viewInvoiceModal" class="m-1 view" data-toggle="modal" onclick="viewInvoice(' . $row['invoicelD'] . ')">
                    <i class="material-icons" data-toggle="tooltip" title="Print">print</i>
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
