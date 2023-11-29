<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculator</title>
</head>
<body>

    <?php
    // Define the electricity rates
    $rate1 = 10; // Rate for the first 10 units
    $rate2 = 12; // Rate for the next 50 units
    $rate3 = 14; // Rate for units beyond 60

    // Initialize variables
    $name = $address = $units = $totalBill = "";

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $address = $_POST["address"];
        $units = $_POST["units"];

        // Calculate the total bill
        if ($units <= 10) {
            $totalBill = $units * $rate1;
        } elseif ($units <= 60) {
            $totalBill = (10 * $rate1) + (($units - 10) * $rate2);
        } else {
            $totalBill = (10 * $rate1) + (50 * $rate2) + (($units - 60) * $rate3);
        }
    }
    ?>

    <h2>Electricity Bill Calculator</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">Name:</label>
        <input type="text" name="name" required value="<?php echo $name; ?>">
        <br>

        <label for="address">Address:</label>
        <input type="text" name="address" required value="<?php echo $address; ?>">
        <br>

        <label for="units">Enter Units Consumed:</label>
        <input type="number" name="units" required value="<?php echo $units; ?>">
        <br>

        <input type="submit" value="Calculate">
    </form>

    <?php
    // Display the result if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h3>Customer Details:</h3>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Address:</strong> $address</p>";

        echo "<h3>Electricity Bill:</h3>";
        echo "<p><strong>Units Consumed:</strong> $units</p>";
        echo "<p><strong>Total Bill Amount:</strong> $totalBill rupees</p>";
    }
    ?>

</body>
</html>
