<?php $title = 'Login'; ?>

<?php if (isset($error)) : ?>
<p style="color: red;">Error : <?= $error; ?></p>
<?php endif; ?>

<?php if (isset($success)) : ?>
<p style="color: green;"><?= $success; ?></p>
<?php endif; ?>

<form method="POST" action="/login" style="display: flex; flex-direction: column; width: 300px; margin: auto;">
    <label for="username" style="margin-bottom: 10px;">Email:</label>
    <input type="text" id="username" name="username" required style="margin-bottom: 20px;">
    <label for="password" style="margin-bottom: 10px;">Password:</label>
    <input type="password" id="password" name="password" required style="margin-bottom: 20px;">
    <input type="submit" value="Login" style="cursor: pointer;">
</form>