<?php 
 //session_start();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Plans</title>
    <style>
        .card-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 200px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card h3 {
            margin: 10px 0;
        }
        .card button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .card button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Choose Your Subscription Plan</h1>
    <div class="card-container">
        <!-- Bronze Card -->
        <div class="card">
            <h3>Bronze</h3>
            <p>Price: Ksh 2500<br><b>Smaller Subscription</b></br></p>
            <form action="checkout.php" method="POST">
                <input type="hidden" name="amount" value="2500">
                <input type="hidden" name="subscription" value="Bronze">
                <button type="submit">Pay with M-Pesa</button>
            </form>
        </div>
        <!-- Silver Card -->
        <div class="card">
            <h3>Silver</h3>
            <br>Price: Ksh 3500<br><b>Medium Subscription</b></br></p>
            <form action="checkout.php" method="POST">
                <input type="hidden" name="amount" value="3500">
                <input type="hidden" name="subscription" value="Silver">
                <button type="submit">Pay with M-Pesa</button>
            </form>
        </div>
        <!-- Gold Card -->
        <div class="card">
            <h3>Gold</h3>
            <p>Price: Ksh 5000<br><b>Lagger Subscription</b></br></p>
            <form action="checkout.php" method="POST">
                <input type="hidden" name="amount" value="5000">
                <input type="hidden" name="subscription" value="Gold">
                <button type="submit">Pay with M-Pesa</button>
            </form>
        </div>
    </div>
</body>
</html>