<?php
include('connect.php');

$dir = $_POST['dir'];

// set up basic connection
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

if (ftp_mkdir($conn_id, $dir)) {
 echo "successfully created $dir\n";
} else {
 echo "There was a problem while creating $dir\n";
}

ftp_close($conn_id);

?>
<button><a href="fileupload.html">Back</a></button>
