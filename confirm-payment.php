<?php
session_start();

// Check if the session variables are set
if (isset($_SESSION["MerchantRequestID"], $_SESSION["CheckoutRequestID"], $_SESSION["phone"], $_SESSION["orderNo"])) {
    $merchantRequestID = $_SESSION["MerchantRequestID"];
    $checkoutRequestID = $_SESSION["CheckoutRequestID"];
    $phone = $_SESSION["phone"];
    $orderNo = $_SESSION["orderNo"];

    // Simulate checking the payment status (replace this with actual logic to query the M-Pesa API)
    $paymentStatus = "PENDING"; // Possible values: SUCCESS, FAILED, PENDING

    // Display appropriate message based on payment status
    if ($paymentStatus === "SUCCESS") {
        $message = "Your payment was successful. Thank you for your order!";
    } elseif ($paymentStatus === "FAILED") {
        $message = "Your payment failed. Please try again.";
    } else {
        $message = "Your payment is still pending. Please wait for confirmation.";
    }
} else {
    $message = "No payment information found. Please initiate a payment.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .message {
            font-size: 20px;
            margin-bottom: 20px;
        }
        .success {
            color: green;
        }
        .failure {
            color: red;
        }
        .pending {
            color: orange;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            font-size: 18px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="message <?php echo strtolower($paymentStatus); ?>">
        <?php echo $message; ?>
    </div>
    <a href="C:\xampp\htdocs\bikes\subscription.php">Go Back to Subscription Plans</a>
</body>
</html>