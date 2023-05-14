<?php
// Get the name from the POST request
$name = $_POST['name'];

// Connect to the database
$servername = "Replace or localhost";
$username = "Replacee with SQL username";
$password = "Replace with SQL pass";
$dbname = "Replace with DB name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO names (name) VALUES (?)");
$stmt->bind_param("s", $name);

// Execute the statement
if ($stmt->execute() === TRUE) {
  echo "Name stored successfully";
} else {
  echo "Error: " . $stmt->error;
}

// Close the statement and the database connection
$stmt->close();
$conn->close();
?>
