<html>
<head>
    <title>Odd or Even Checker</title>
</head>
<body>
    <h1>Check Odd or Even</h1>
    <form method="POST">
        <input type="number" name="number" placeholder="Enter a number" required>
        <button type="submit">Check</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST["number"];
        if ($number % 2 == 0) {
            echo "<p>$number is Even </p>";
        } else {
            echo "<p>$number is Odd </p>";
        }
    }
    ?>
</body>
</html>

