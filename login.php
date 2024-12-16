<html>
<head>
<title>Login Form</title>
</head>
<body>
<h2>Login Form</h2>
<form method="GET" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" value="Login" name="sbtn">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "db4";
$conn = mysqli_connect($servername, $username, $password, $db);

if ($conn) {
    if (isset($_REQUEST["sbtn"])) {
        // Sanitize user inputs
        $user = $_REQUEST["username"];
        $pass = $_REQUEST["password"];

        // Prepared statement to avoid SQL injection
        $sql = "SELECT * FROM users_table WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $sql);
        
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
        
        // Execute the query
        mysqli_stmt_execute($stmt);
        
        // Store result
        $result = mysqli_stmt_get_result($stmt);
        
        // Check if the username and password match
        if (mysqli_num_rows($result) > 0) {
            header("Location: welcome.php?username=" . $user);
            exit();
        } else {
            echo "<script>alert('Incorrect Username or Password')</script>";
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    }
    
    // Close the database connection
    mysqli_close($conn);
}
?>
</body>
</html>
