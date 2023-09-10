<html lang="en">
<head>
    <title>Register</title>
</head>
<body>
<?php foreach ($_SESSION["errors"] ?? [] as $error): ?>
<p><?php echo $error; ?></p>
<?php endforeach; ?>


<form method="POST" action="/register">
    <label for="username">Name:</label><br>
    <input type="text" id="name" name="name" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" value="Register">
</form>

</body>
</html>