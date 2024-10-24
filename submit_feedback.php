<?php
// Capturing form data
$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];
$rating = $_POST['rating'];

// Connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campaign_feedback";

// Creating a  connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the feedback table
$sql = "INSERT INTO feedback (name, email, feedback, rating) 
        VALUES ('$name', '$email', '$feedback', $rating)";

if ($conn->query($sql) === TRUE) {
    echo "Feedback submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Closing connection
$conn->close();
