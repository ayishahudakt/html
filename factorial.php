<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial Calculator</title>
</head>
<body>
    <h1>Factorial Calculator</h1>
    <form method="POST">
        <input type="number" name="number" placeholder="Enter a number" required>
        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST["number"];
        $factorial = 1;

        for ($i = 1; $i <= $number; $i++) {
            $factorial = $factorial * $i; // Explicit multiplication
        }

        echo "<p>Factorial of $number is <strong>$factorial</strong>.</p>";
    }
    ?>
</body>
</html>

