<?php
require __DIR__ . "/../inc/Database.php";
require __DIR__ . "/./inc/essentials.php";

$db = new Database();
$db->connect();

session_start();
session_regenerate_id(true);
if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] === true) {
    redirect('../admincp/index.php');
}

if (isset($_POST['login'])) {
    $frm_data = filteration($_POST);
    $query = "SELECT * FROM `admin_cred` WHERE `AdminName` = ? AND `AdminPass` = ?";
    $values = [$frm_data['admin_name'], $frm_data['admin_pass']];
    $res = select($db, $query, $values, "ss");
    if ($res->num_rows == 1) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['adminLogin'] = true;
        $_SESSION['adminId'] = $row['SrNo'];
        redirect('../views/admincp/index.php');
    } else {
        alert('error', 'Login failed - Invalid Credentials!');
    }
}

$db->close();
