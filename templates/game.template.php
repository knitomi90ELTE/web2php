<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Beadandó - Webfejlesztés 2.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/sandstone/bootstrap.min.css" rel="stylesheet" integrity="sha256-oqtj+Pkh1c3dgdH6V9qoS7qwhOy2UZfyVK0qGLa9dCc= sha512-izanB/WZ07hzSPmLkdq82m5xS7EH/qDMgl5aWR37EII+rJOi5c6ouJ3PYnrw6K+DWQcnMZ+nO1NqDr6SBKLBDg==" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/png" href="http://webprogramozas.inf.elte.hu/hallgatok/knitomi90/bead/templates/images/snake.png">
        <link rel="stylesheet" type="text/css" href="http://webprogramozas.inf.elte.hu/hallgatok/knitomi90/bead/templates/css/style.css">
        <link rel="stylesheet" type="text/css" href="http://webprogramozas.inf.elte.hu/hallgatok/knitomi90/bead/templates/css/mymodal.css">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Webfejlesztés 2.</a>
                    <?php if (isset($_SESSION['belepve'])): ?>
                        <a class="navbar-brand" href="logout">Kijelentkezés</a>
                    <?php else: ?>
                        <a class="navbar-brand" href="login">Bejelentkezés</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="well">
                <h1>Beadandó - Webfejlesztés 2.</h1>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6"><h6>Help</h6></div>
                            <div class="col-md-6"><button class="btn btn-sm pull-right" id="toggleHelpButton">Mutasd</button></div>
                        </div>
                    </div>
                    <div class="panel-body hidden" id="helpPanel">
                        Bölcsesség tekercse (kék): a sárkány 4 egységgel növekszik tőle.<br>
                        Tükrök tekercse (szürke): az irányítás tükörképben történik irányonként (fel helyett le, bal helyett jobb).<br>
                        Fordítás tekercse (zöld): a sárkány haladási iránya megfordul (feje és farka helyett cserél). - Nem működik!<br>
                        Mohóság tekercse (lila): a sárkány haladási sebessége másfélszeresére nő 5 másodpercig.<br>
                        Lustaság tekercse (sárga): a sárkány haladási sebessége másfélszeresére csökken 5 másodpercig.<br>
                        Falánkság tekercse (piros): a sárkány 10 egységgel növekszik tőle.
                    </div>
                </div>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6"><h6>Ismert Hibák</h6></div>
                            <div class="col-md-6"><button class="btn btn-sm pull-right" id="toggleIssuesButton">Mutasd</button></div>
                        </div>
                    </div>
                    <div class="panel-body hidden" id="issuePanel">
                        Ha egy mozgási intervallumon belül változtatjuk a srákány irányát, akkor képes önmagába fordulni.<br>
                        Sajnos erre nem találtam megoldást.
                    </div>
                </div>

                <div class="form-group hidden">
                    <label for="n">Szélesség:</label>
                    <input type="number" class="form-control input-sm" id="n" min="3" value="<?= (empty($_GET['x'])) ? 10 : $_GET['x'] ?>">
                    <br>
                    <label for="m">Magasság:</label>
                    <input type="number" class="form-control input-sm" id="m" min="3" value="<?= (empty($_GET['y'])) ? 10 : $_GET['y'] ?>">
                    <br>
                    <label for="k">Tereptárgyak száma:</label>
                    <input type="number" class="form-control input-sm" id="k" min="0" value="<?= (empty($_GET['obs'])) ? 10 : $_GET['obs'] ?>">
                    <br>
                    <button id="generateButton" type="button" class="btn btn-info">Pályakészítés</button>
                </div>
                <div class="form-group">
                    <button id="startGame" type="button" class="btn btn-success">Start</button>
                    <button id="pauseGame" type="button" class="btn btn-primary">Szünet</button>
                </div>
                <div class="form-group">
                    <p class="lead" id="score">Score: 1</p>
                    <p class="lead" id="scroll">Aktív tekercs: nincs</p>
                </div>
                <div class="well light-green">
                    <table id="gameTable">

                    </table>
                </div>
            </div>
        </div>

        <div id="myModal" class="my-modal">
            <div class="my-modal-content">
                <div class="my-modal-header">
                    <h1 class="text-center">Játék vége</h1>
                </div>
                <div class="my-modal-body">
                    <h2 id="modal-message" class="text-center"></h2>
                    <div class="form-group center-block">
                        <button id="newGame" type="button" class="btn btn-success center-block">Új játék</button>
                    </div>
                </div>
                <div class="my-modal-footer"></div>
            </div>
        </div>

        <script src="http://webprogramozas.inf.elte.hu/hallgatok/knitomi90/bead/templates/js/selector.js" type="text/javascript"></script>
        <script src="http://webprogramozas.inf.elte.hu/hallgatok/knitomi90/bead/templates/js/mymodal.js" type="text/javascript"></script>
        <script src="http://webprogramozas.inf.elte.hu/hallgatok/knitomi90/bead/templates/js/game.js" type="text/javascript"></script>
    </body>
</html>
