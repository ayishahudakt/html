<html>
<body>
<h2>Welcome</h2>
<?php
$username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';
echo "<p>Welcome, $username!</p>";
?>
<p>This is the welcome page.</p>
</body>
</html>

