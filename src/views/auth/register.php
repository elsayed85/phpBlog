<?php $title = 'Register'; ?>

<?php foreach ($errors as $error) : ?>
<p style="color: red;"><?php echo $error; ?></p>
<?php endforeach; ?>

<form method="POST" action="/register" style="display: flex; flex-direction: column; width: 300px; margin: auto;">
    <label for="username" style="margin-bottom: 10px;">Name:</label>
    <input type="text" id="name" name="name" required style="margin-bottom: 20px;">
    <label for="email" style="margin-bottom: 10px;">Email:</label>
    <input type="email" id="email" name="email" required style="margin-bottom: 20px;">
    <label for="password" style="margin-bottom: 10px;">Password:</label>
    <input type="password" id="password" name="password" required style="margin-bottom: 20px;">
    <input type="submit" value="Register" style="cursor: pointer;">
</form>