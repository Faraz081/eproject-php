<?php
$host = "localhost";
$user = "root";   // XAMPP default user
$pass = "";       // default password blank hota hai
$db   = "vaccination_db"; // tumhara DB name

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
