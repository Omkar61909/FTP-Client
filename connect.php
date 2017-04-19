<?php

$ftp_server = $_POST['host'];
$ftp_username = $_POST['username'];
$ftp_password = $_POST['password'];

/*Check connection*/
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_username, $ftp_password);

if ((!$conn_id) || (!$login_result)) {  // check connection
    // wont ever hit this, b/c of the die call on ftp_login
    echo "<h2>FTP connection has failed! <br />";
    echo "Attempted to connect to $ftp_server for user $ftp_username</h2>";
    exit;
} else {
    echo "Connected to $ftp_server, for user $ftp_username <br />";
    session_start();
    $_SESSION['host'] = $ftp_server;  // Address of FTP server.
    $_SESSION['username'] = $ftp_username; // Username
    $_SESSION['password'] = $ftp_password;
}

echo file_get_contents("fileupload.html");
?>