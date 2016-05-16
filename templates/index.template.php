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
            <?php if (isset($_SESSION['belepve'])): ?>
                <a class="navbar-brand" href="logout">Kijelentkezés</a>
            <?php else: ?>
                <a class="navbar-brand" href="login">Bejelentkezés</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="container">
    <div class="center-block" style="width: 35%;"><a href="game"><img src="http://webprogramozas.inf.elte.hu/hallgatok/knitomi90/bead/templates/images/python-logo-outline-320.png" alt="Snake logo" class="img-responsive center-block"></a></div>
    <div class="lead text-center">A játékhoz kattints a képre!</div>
    <div class="row center-block" style="width: 50%;">
        <div class="col-md-6">
            <a href="login" type="button" class="btn btn-info btn-block">BELÉPÉS</a>
        </div>
        <div class="col-md-6">
            <a href="registration" type="button" class="btn btn-info btn-block">REGISZTRÁCIÓ</a>
        </div>
    </div>

</div>
</body>
</html>