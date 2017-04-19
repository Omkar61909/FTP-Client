<?php

// define some variables
$old_file = $_POST['old'];
$new_file = $_POST['new'];


$ftp_server = "172.20.101.32"; // Address of FTP server.
$ftp_user_name = "bhavya"; // Username
$ftp_user_pass = 'bhavya';

// set up basic connection
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// try to rename $old_file to $new_file
if (ftp_rename($conn_id, $old_file, $new_file)) {
 echo "successfully renamed $old_file to $new_file\n";
} else {
 echo "There was a problem while renaming $old_file to $new_file\n";
}

// close the connection
ftp_close($conn_id);

?>
<button><a href="fileupload.html">Back</a></button>
