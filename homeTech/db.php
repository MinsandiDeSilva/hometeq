<?php 
//php local variable 
$dbhost = 'localhost'; //conncting to the host of the DB
$dbuser = 'root'; 
$dbpass = ''; 
$dbname = 'homeTeq'; 
 
//create a DB connection
//local php variable 
//builtin method called mysqli_connect() with 4 parameters to connect with the DB
$conn = mysqli_connect("localhost", "root", "", "homeTeq"); 

//if the DB connection fails, display an error message and exit 
if (!$conn) 
{ 
//terminate the program using a method called die()
  die('Could not connect: ' . mysqli_error($conn)); 
} 

//select the database using a builtin method called mysqli_select_db()
mysqli_select_db($conn, "homeTeq");
echo "<p> DB connected successfully</p>" 
?> 