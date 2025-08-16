<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bikerental";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Values to be inserted
$orderNo = "";
$amount = "";
$phone = "254717399830";
$CheckoutRequestID = "";
$MerchantRequestID = "";

// Insert query
$sql = "INSERT INTO `orders`(`ID`, `orderNo`, `amount`, `phone`, `CheckoutRequestID`, `MerchantRequestID`) 
        VALUES ('','$orderNo','$amount','$phone','$CheckoutRequestID','$MerchantRequestID');";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
