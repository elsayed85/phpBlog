<html lang="en">
<head>
    <title>Login</title>
</head>
<body>

<?php
if ($error) {
    echo "<p>Error : $error</p>";
}
?>

<?php
if ($success) {
    echo "<p>$success</p>";
}
?>

<form method="POST" action="/login">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
</body>
</html>