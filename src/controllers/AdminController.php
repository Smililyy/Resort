<?php
require '../../../vendor/php-imap-master/vendor/autoload.php';
require __DIR__ . "/../inc/Database.php";
require __DIR__ . "/./inc/essentials.php";

// function adminLogin()
// {
//     session_start();
//     if (!isset($_SESSION['adminLogin']) && ($_SESSION['adminLogin'] == true)) {
//         echo "<script>
//     window.location.href='auth.php';
//     </script>;";
//         exit;
//     }
//     // session_regenerate_id(true);
// }

use PhpImap\Mailbox;


// Gmail IMAP settings
$server = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'santelacuisine@gmail.com';
$password = 'ifdknnejliqzbzqj';

// Create a mailbox instance
$mailbox = new Mailbox($server, $username, $password, __DIR__, 'UTF-8', true, false);

// Get all emails
$emails = $mailbox->searchMailbox('ALL');

// Connect to your database

$db = new Database();
$db->connect();

// Prepare the SQL statement
$sql = "INSERT INTO MESSAGE VALUES (NULL, ?, ?, ?, ?)";
$stmt = $db->prepare($sql);

// Bind parameters
$stmt->bind_param("ssss", $subject, $fromAddress, $textPlain, $timestamp);

// Loop through emails and save them to the database
foreach ($emails as $emailId) {
    $email = $mailbox->getMail($emailId);

    $subject = $email->subject;
    $fromAddress = $email->fromAddress;
    $textPlain = $email->textPlain;
    $timestamp = $email->date; // Convert date to timestamp

    // Execute the prepared statement
    $result = $stmt->execute();

    if ($result) {
        echo "Email saved successfully.<br>";
    } else {
        echo "Error saving email: " . $stmt->error . "<br>";
    }
}

// Close the statement and the database connection
$stmt->close();
$db->close();

// Disconnect from the mailbox
$mailbox->disconnect();
