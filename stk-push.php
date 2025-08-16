<?php
session_start();

// Retrieve form data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['amount'], $_POST['subscription'])) {
    $amount = $_POST['amount'];
    $subscription = $_POST['subscription'];
    $phone_number = $_POST['phone_number'] ?? '0717399830'; // Default phone number for testing

    // Save subscription details in session
    $_SESSION['subscription'] = $subscription;
    $_SESSION['amount'] = $amount;

    // M-Pesa API credentials
    $consumerKey = 'YM1exLPGq6JAzPrac5Irgmqr4jk4nKMYBkgtzfgcJZzhmEwy';
    $consumerSecret = 'I6r67uSkz5kzPAPgp2QSkVMyop06wUxJhS59HROA1LX0hvDQgLo9SXDHhMuQt8dh';
    $shortCode = '174379';
    $passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
    $callbackURL = './callback.php';

    // Generate access token
    //$credentials = base64_encode("$consumerKey:$consumerSecret");
    //$ch = curl_init();
    //curl_setopt($ch, CURLOPT_URL, 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
    //curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Basic $credentials"]);
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //$response = curl_exec($ch);
    //curl_close($ch);
    //$accessToken = json_decode($response)->access_token;

    // Initiate STK Push
    $timestamp = date('YmdHis');
    $password = base64_encode($shortCode . $passkey . $timestamp);
    $stkPushData = [
        'BusinessShortCode' => $shortCode,
        'Password' => $password,
        'Timestamp' => $timestamp,
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $amount,
        'PartyA' => $phone_number,
        'PartyB' => $shortCode,
        'PhoneNumber' => $phone_number,
        'CallBackURL' => $callbackURL,
        'AccountReference' => $subscription,
        'TransactionDesc' => "Payment for $subscription subscription"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $accessToken",
        "Content-Type: application/json"
    //]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($stkPushData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Handle response
    $responseData = json_decode($response, true);
    if (isset($responseData['ResponseCode']) && $responseData['ResponseCode'] == '0') {
        echo "Payment request sent to your phone. Please complete the payment.";
    } else {
        echo "Failed to initiate payment. Please try again.";
    }
} else {
    header("Location: stk-push.php");
    exit();
}
?>