<?php

function getContacts($db)
{
    $query = "SELECT * FROM `contact_detail` WHERE `ContactID` = ?";
    $values = [1];
    $res = select($db, $query, $values, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    return $json_data;
    $db->close();
}


function updContacts($db, $post)
{
    $frm_data = filteration($post);
    $q = "UPDATE `contact_detail` SET `address`=?,`website`=?,`pn1`=?,`pn2`=?,`email`=?,`fb`=?,`tpv`=? WHERE `ContactID` = ?";
    $values = [$frm_data['address'], $frm_data['website'], $frm_data['pn1'], $frm_data['pn2'], $frm_data['email'], $frm_data['fb'], $frm_data['tpv'], 1];
    $res = update($db, $q, $values, 'sssssssi');
    return $res;
    $db->close();
}
