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
    session_regenerate_id(true);
}
use PhpImap\Mailbox;

// Include the PHP-IMAP library
require '../../../vendor/php-imap-master/vendor/autoload.php';

// Gmail IMAP settings
$server = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'santelacuisine@gmail.com';
$password = 'ifdknnejliqzbzqj';

// Create a mailbox instance
$mailbox = new Mailbox($server, $username, $password, __DIR__, 'UTF-8', true, false);

// Get all emails
$emails = $mailbox->searchMailbox('ALL');

// Connect to your database
$mysqli = new mysqli("localhost", "root", "", "hotel");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare the SQL statement
$sql = "INSERT INTO messages (subject, sender, content, timestamp) VALUES (?, ?, ?,?)";
$stmt = $mysqli->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $mysqli->error);
}

// Bind parameters
$stmt->bind_param("ssss", $subject, $fromAddress, $textPlain, $timestamp);

// Loop through emails and save them to the database
foreach ($emails as $emailId) {
    $email = $mailbox->getMail($emailId);

    $subject = $email->subject;
    $fromAddress = $email->fromAddress;
    $textPlain = $email->textPlain;
    $timestamp = strtotime($email->date); // Convert date to timestamp

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
$mysqli->close();

// Disconnect from the mailbox
$mailbox->disconnect();
