<html>
<head>
<title>Employee Details</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label for="emp_id">Employee ID:</label>
<input type="text" name="emp_id" required><br>
<label for="emp_name">Employee name:</label>
<input type="text" name="emp_name" required><br>
<label for="designation">Designation:</label>
<input type="text" name="designation" required><br>
<label for="salary">Salary:</label>
<input type="number" name="salary" required><br>
<input type="submit" value="Add new employee">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empl2db";
$conn = mysqli_connect($servername, $username, $password);
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS $dbname");
mysqli_select_db($conn, $dbname);

$sql_create_table = "CREATE TABLE IF NOT EXISTS emp_details (
emp_id INT PRIMARY KEY,
emp_name VARCHAR(255) NOT NULL,
designation VARCHAR(50) NOT NULL,
salary VARCHAR(100) NOT NULL
)";
mysqli_query($conn, $sql_create_table);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST["emp_id"];
    $emp_name = $_POST["emp_name"];
    $designation = $_POST["designation"];
    $salary = $_POST["salary"];
    $sql_insert = "INSERT INTO emp_details (emp_id, emp_name, designation, salary) 
                    VALUES ('$emp_id', '$emp_name', '$designation', '$salary')";
    mysqli_query($conn, $sql_insert);
    echo "Employee information added successfully.";
}

$result = mysqli_query($conn, "SELECT * FROM emp_details");
if (mysqli_num_rows($result) > 0) {
    echo "<h2>Employee Details:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Emp ID</th><th>Emp Name</th><th>Designation</th><th>Salary</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['emp_id']}</td><td>{$row['emp_name']}</td><td>{$row['designation']}</td><td>{$row['salary']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "No employee found.";
}
mysqli_close($conn);
?>

</body>
</html>
