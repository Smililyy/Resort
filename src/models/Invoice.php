<?php

function listInvoice($db)
{
    $sql = "SELECT * FROM INVOICE";
    $result = $db->queryNoStmt($sql);
    if ($result) {
        $html = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>';
            $html .= '<td>' . $row['InvoicelD'] . '</td>';
            $html .= '<td>' . $row['BookingID'] . '</td>';
            $html .= '<td>' . $row['PaymentDate'] . '</td>';
            $html .= '<td>' . $row['Amount'] . '</td>';
            $html .= '<td>';
            $html .= '<div class="d-flex">';
            $html .= '<a href="#viewInvoiceModal" class="m-1 view" data-toggle="modal" onclick="viewInvoice(' . $row['InvoicelD'] . ')">
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
    $sql = "SELECT INVOICE.InvoicelD, CUSTOMER.CustomerAddress, CUSTOMER.CustomerFirstName, CUSTOMER.CustomerLastName
    FROM INVOICE
    JOIN BOOKING ON INVOICE.BookingID = BOOKING.BookingID
    JOIN CUSTOMER ON BOOKING.CustomerID = CUSTOMER.CustomerID
    WHERE InvoicelD = '$id'";
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
    FROM INVOICE
      WHERE InvoicelD LIKE '%" . $searchQuery . "%'
        OR BookingID LIKE '%" . $searchQuery . "%'
        OR PaymentDate LIKE '%" . $searchQuery . "%'
        OR Amount LIKE '%" . $searchQuery . "%'";

    $result = $db->queryNoStmt($sql);
    if ($result) {
        $html = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>';
            $html .= '<td>' . $row['InvoicelD'] . '</td>';
            $html .= '<td>' . $row['BookingID'] . '</td>';
            $html .= '<td>' . $row['PaymentDate'] . '</td>';
            $html .= '<td>' . $row['Amount'] . '</td>';
            $html .= '<td>';
            $html .= '<div class="d-flex">';
            $html .= '<a href="#viewInvoiceModal" class="m-1 view" data-toggle="modal" onclick="viewInvoice(' . $row['InvoicelD'] . ')">
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
