<!DOCTYPE html>
<html>

    <!-- HEAD -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.css">
        <link rel="stylesheet" href="../public/css/main.css">
        <title><?= App::getInstance()->title; ?></title>
    </head>
    <!-- END HEAD -->

    <!-- BODY -->    
    <body>

        <nav class="navbar is-fixed-top is-info">
            <div class="container">
                <div class="navbar-brand">
                    <span class="navbar-item logomenu">
                        Menu
                    </span>
                <div class="navbar-burger" data-target="navMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                </div>


            <div id="navMenu" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="?p=admin.index">
                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                    </a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="/documentation/overview/start/">
                    Docs
                    </a>
                    <div class="navbar-dropdown">
                    <a class="navbar-item" href="/documentation/overview/start/">
                        Overview
                    </a>
                </div>
                </div>
            </div>    
        </nav>

        <div class="container" style="padding-top:6.25em;">
            <?= $content ?>
        </div>




        <?= require ROOT . '/public/js/js.php' ?>

        
    </body>
    <!-- END BODY -->
</html>