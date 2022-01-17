<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("email-app-database.c9o0inoiq4sv.us-east-1.rds.amazonaws.com", "master", "password", "email_app");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//Get user inputs
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];

// Attempt insert query execution
$sql = "INSERT INTO persons VALUES (NULL, '$first_name', '$last_name', '$email')";
//$stmt = mysqli_prepare($sql);
//$stmt->bind_param("sss", $_POST['first_name_val'], $_POST['last_name_val'], $_POST['email_val']);
//$stmt->execute();

//if(mysqli_query($link, $sql)){
if ($link->query($sql) === TRUE){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
