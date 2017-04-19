<?php
//include('connect.php');
session_start();

// set up basic connection
$ftp_server = $_SESSION['host']; // Address of FTP server.
$ftp_user_name = $_SESSION['username']; // Username
$ftp_user_pass = $_SESSION['password'];

/*$ftp_server = "192.168.1.33"; // Address of FTP server.
$ftp_user_name = "parzival"; // Username
$ftp_user_pass = 'parzival';*/
    
echo "<center><h1>".$ftp_server."</h1></center>";

$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

$contents = ftp_nlist($conn_id, ".");

$exa = (array)$contents;
// output $contents
//var_dump($contents);


echo "<!DOCTYPE html>
    <html>
      <head>
        <title>Result</title>
        <link rel='stylesheet' type='text/css' href='design.css'>
        <link rel='stylesheet' type='text/css' href='search.css'> 
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
      </head>
      <body>
      <center>";

//var_dump($exa);
//while($contents)

echo "<table>";    
for($i=0;$i<count($exa);$i++)
{
    echo "<tr>";
    echo "<td>".$exa[$i]."</td>";
    
    echo "</tr>";
}
echo "<table>";

ftp_close($conn_id);

?>
    <button class="btn"><a href="fileupload.html">Back</a></button>
