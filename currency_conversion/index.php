<?php
// Hardcoded exchange rates
$usdToInrRate = 73.5; // 1 USD to INR
$inrToUsdRate = 1 / $usdToInrRate; // 1 INR to USD

// Function to convert from USD to INR
function convertUsdToInr($amount) {
    global $usdToInrRate;
    return $amount * $usdToInrRate;
}

// Function to convert from INR to USD
function convertInrToUsd($amount) {
    global $inrToUsdRate;
    return $amount * $inrToUsdRate;
}

// Handle form submission
$result = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST["amount"];
    $currencyFrom = $_POST["currency_from"];
    $currencyTo = $_POST["currency_to"];

    if ($currencyFrom == "usd" && $currencyTo == "inr") {
        $convertedAmount = convertUsdToInr($amount);
        $result = "$amount USD is equal to $convertedAmount INR.";
    } elseif ($currencyFrom == "inr" && $currencyTo == "usd") {
        $convertedAmount = convertInrToUsd($amount);
        $result = "$amount INR is equal to $convertedAmount USD.";
    } else {
        $result = "Invalid currency selection.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select, button {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        p {
            font-weight: bold;
            color: #333;
            margin-top: 16px;
        }
    </style>
</head>
<body>

    <form method="post" action="index.php">
        <label for="amount">Amount:</label>
        <input type="number" name="amount" required>

        <label for="currency_from">From:</label>
        <select name="currency_from">
            <option value="usd">USD</option>
            <option value="inr">INR</option>
        </select>

        <label for="currency_to">To:</label>
        <select name="currency_to">
            <option value="usd">USD</option>
            <option value="inr">INR</option>
        </select>

        <button type="submit">Convert</button>

        <?php if ($result): ?>
            <p><?php echo $result; ?></p>
        <?php endif; ?>
    </form>

</body>
</html>
