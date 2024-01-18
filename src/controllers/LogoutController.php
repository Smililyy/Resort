<?php
require __DIR__ . "/./inc/essentials.php";
session_start();
session_destroy();
redirect('../views/admincp/auth.php');
