<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

$con = mysqli_connect(
    $servername,
    $username,
    $password,
    $dbname
);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
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

function alert($type, $msg)
{
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<< alert
        <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
        <strong> $msg</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        alert;
}

function redirect($url)
{
    echo "<script>
    window.location.href='$url';
    </script>;
    ";
}


session_start();
session_regenerate_id(true);
if (isset($_SESSION['adminLogin']) && ($_SESSION['adminLogin'] == true)) {
    redirect('../admincp/index.php');
}

if (isset($_POST['login'])) {
    $frm_data = filteration($_POST);
    $query = "SELECT * FROM `admin_cred` WHERE `admin_name` = ? AND `admin_pass` = ?";
    $values = [$frm_data['admin_name'], $frm_data['admin_pass']];
    $res = select($query, $values, "ss");
    if ($res->num_rows == 1) {
        $row = mysqli_fetch_assoc($res);
        session_start();
        $_SESSION['adminLogin'] = true;
        $_SESSION['adminId'] = $row['sr_no'];
        redirect('../views/admincp/index.php');
    } else {
        alert('error', 'Login failed - Invalid Credentials!');
    }
}
