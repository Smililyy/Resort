<?php
include "inc/db_config.php";

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
        $html .= '<td>' . $row['customerAddress'] . '</td>';
        $html .= '<td>' . $row['customerPhoneNumber'] . '</td>';
        $html .= '<td>' . $row['customerEmail'] . '</td>';
        $html .= '<td><div class="d-flex">';
        $html .= '<a href="#viewEmployeeModal" class="m-1 view" data-toggle="modal" onclick=viewEmployee("' . $row['customerID'] . '")><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
        $html .= '<a href="#editEmployeeModal" class="m-1 edit" data-toggle="modal" onclick=viewEmployee("' . $row['customerID'] . '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
        $html .= '<a href="#deleteEmployeeModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' . $row['customerID'] . '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
        $html .= '</div></td>';
        $html .= '</tr>';
    }

    // Echo the generated HTML
    echo $html;
} else {
    echo 'Error executing SQL query: ' . mysqli_error($con);
}
?>
