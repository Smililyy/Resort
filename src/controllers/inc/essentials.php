<?php

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

function select($db, $sql, $values, $datatypes)
{
    // $db = new Database(); // Tạo đối tượng Database
    $stmt = $db->prepare($sql);
    mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
    if (mysqli_stmt_execute($stmt)) {
        $res = $stmt->get_result();
        $stmt->close();
        return $res;
    } else {
        $stmt->close();
        die("Query cannot be executed - Select");
    }
}
