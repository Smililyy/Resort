<?php
require '../../inc/Database.php';
require '../../models/Setting.php';
require '../../models/Contact_Detail.php';

$db = new Database();
$db->connect();

if (isset($_POST['get_general'])) {
    echo getGeneral($db);
}

if (isset($_POST['upd_general'])) {
    echo updGeneral($db, $_POST);
}

if (isset($_POST['upd_shutdown'])) {
    $frm_data = ($_POST['upd_shutdown'] == 0) ? 1 : 0;
    $q = "UPDATE `setting` SET `Shutdown` = ? WHERE `SettingID` = ?";
    $values = [$frm_data, 1];
    $res = update($db, $q, $values, 'ii');
    echo $res;
}

if (isset($_POST['get_contacts'])) {
    echo getContacts($db);
}

if (isset($_POST['upd_contacts'])) {
    echo updContacts($db, $_POST);
}

$db->connect();
