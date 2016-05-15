<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web-fejlesztés 2.</title>
    <title>Beadandó - Webfejlesztés 2.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/sandstone/bootstrap.min.css" rel="stylesheet"
          integrity="sha256-oqtj+Pkh1c3dgdH6V9qoS7qwhOy2UZfyVK0qGLa9dCc= sha512-izanB/WZ07hzSPmLkdq82m5xS7EH/qDMgl5aWR37EII+rJOi5c6ouJ3PYnrw6K+DWQcnMZ+nO1NqDr6SBKLBDg=="
          crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index">Webfejlesztés 2.</a>
        </div>
    </div>
</nav>

<div class="container">
    <h1>Web-fejlesztés 2.</h1>
    <h2 class="form-signin-heading">Bejelentkezés</h2>
    <?php if ($errors) : ?>
        <ul class="list-group">
            <?php foreach ($errors as $error) : ?>
                <li class="list-group-item list-group-item-danger"><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="" method="post">
        <fieldset class="form-group">
            <label>Email:</label>
            <input type="text" name="email" class="form-control">
        </fieldset>
        <fieldset class="form-group">
            <label>Jelszó:</label>
            <input type="password" name="password" class="form-control">
        </fieldset>
        <button class="btn btn-primary" type="submit" name="login">Belépés</button>
    </form>
</div>
</body>
</html>