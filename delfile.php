<?php
$ftp_server = "172.20.101.32"; // Address of FTP server.
$ftp_user_name = "bhavya"; // Username
$ftp_user_pass = "bhavya";

$file = $_POST['delfile'];

// set up basic connection
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

if (ftp_delete($conn_id, $file)) {
 echo "$file deleted successful\n";
} else {
 echo "could not delete $file\n";
}


ftp_close($conn_id);

?>
<button><a href="fileupload.html">Back</a></button>
