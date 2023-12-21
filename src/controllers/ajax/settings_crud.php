<?php

$servername = "sql12.freesqldatabase.com";
$username = "sql12670612";
$password = "lrzZ8N6luY";
$dbname = "sql12670612";

$con = mysqli_connect(
    $servername,
    $username,
    $password,
    $dbname
);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
function adminLogin()
{
    session_start();
    if (!isset($_SESSION['adminLogin']) && ($_SESSION['adminLogin'] == true)) {
        echo "<script>
    window.location.href='auth.php';
    </script>;
    ";
    }
}

function select($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Select");
        }
    } else {
        die("Query cannot be prepared - Select");
    }
}

function update($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Update");
        }
    } else {
        die("Query cannot be prepared - Update");
    }
}

function filteration($data)
{
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
        $data[$key] = stripslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}

if (isset($_POST['get_general'])) {
    $query = "SELECT * FROM `settings` WHERE `sr_no` = ?";
    $values = [1];
    $res = select($query, $values, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;
}


if (isset($_POST['upd_general'])) {
    $frm_data = filteration($_POST);
    $q = "UPDATE `settings` SET `side_title` = ?, `side_about` = ? WHERE `sr_no` = ?";
    $values = [$frm_data['side_title'], $frm_data['side_about'], 1];
    $res = update($q, $values, "ssi");
    echo $res;
}
