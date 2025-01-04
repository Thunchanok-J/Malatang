<?php
// Define database connection parameters
$host = "localhost"; // Change this to your MySQL server hostname
$user = "root"; // Change this to your MySQL username
$pass = ""; // Change this to your MySQL password if applicable, otherwise leave it empty
$db = "malatang"; // Change this to the name of your database
$port = 3307;
// Create connection
$conn = mysqli_connect($host, $user, $pass, $db,$port);
#if($conn) {echo "Connection Successful";}
#else {echo "Connection Error";}


?>