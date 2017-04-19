<?php
include('connect.php');

if(empty($_SESSION)){ // if the session not yet started 
    header("location: ../log.html"); // send to home page
    exit; 
} 
   

$name = $_FILES["uploadedfile"]["name"];
$filename = "../test/".$name;

// set up basic connection
$ftp_server = $_SESSION['host']; // Address of FTP server.
$ftp_user_name = $_SESSION['username']; // Username
$ftp_user_pass = $_SESSION['password'];

$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
$destination_file = "/home/parzival/"; //where you want to throw the file on the webserver (relative to your login dir)

if ((!$conn_id) || (!$login_result)) {  // check connection
    // wont ever hit this, b/c of the die call on ftp_login
    echo "<h2>FTP connection has failed! <br />";
    echo "Attempted to connect to $ftp_server for user $ftp_user_name</h2>";
    exit;
} else {
    echo "Connected to $ftp_server, for user $ftp_user_name <br />";
}

$upload = ftp_put($conn_id, $destination_file.$name, $filename, FTP_BINARY);  // upload the file
if (!$upload) {  // check upload status
    echo "<span style='color:#FF0000'><h2>FTP upload of $filename has failed!</h2></span> <br />";
} else {
    echo "<span style='color:#339900'><h2>Uploading $name Completed Successfully!</h2></span><br /><br />";
}


ftp_close($conn_id);

?>
    <button><a href="fileupload.html">Back</a></button>
