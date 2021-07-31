<?php
// Create connection
$conn = mysqli_connect("localhost","root","","bookstore2");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE information(
name VARCHAR(30),email VARCHAR(50),mobile VARCHAR(10),birth_date DATE,
address VARCHAR(30),
username VARCHAR(30),
password VARCHAR(30)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table information created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
