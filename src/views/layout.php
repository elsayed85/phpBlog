<!DOCTYPE html>
<html>

<head>
    <title><?= isset($title) ? $title : config('app.name') ?></title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
    <header>
        <div class="logo" style="color: #333; font-size: 24px; float: left; margin: 10px;"><?= config('app.name') ?>
        </div>
        <nav>
            <ul>
                <?php if (authCheck()) : ?>
                <li><a href="/">Home</a></li>
                <li>
                    <form action="logout" method="post" class="logout-form">
                        <input type="submit" value="Logout" class="logout-button">
                    </form>
                </li>

                <?php endif; ?>
                <?php if (!authCheck()) : ?>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <div style="clear: both;"></div>

    <main>
        <?= $content ?>
    </main>

    <footer>
        <p>Copyright &copy; <?= date("Y") ?></p>
    </footer>

</body>

</html>