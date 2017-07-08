<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Moja strona domowa. Zapraszam :)" >
        <meta name="keywords" content="Strona domowa, myhomepage, homepage, mateusz, kadłubowski, mateusz kadłubowski, umk, toruń, 267532" >
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="app/css/css.css">
        <title>Strona domowa | <?php echo $title; ?></title>
        <base href="<?php echo SERVER_ADDRESS; ?>">
    </head>
    <body>
        <div class="contener">
            <header>
                <div class="left-blur"></div>
                <div class="right-blur"></div> 
                <a href="?page=index">            
                    <div>
                        <h1>Strona domowa</h1>
                        <span>Mateusz Kadłubowski</span>
                    </div>
                </a>
            </header>
            <div class="content">
                <div class="side-panel">
                    <section class="priv">
                        <i class="icon-lock"></i> <h2>Strefa prywatna</h2>
                        <?php include $privAreaFile; ?>
                    </section>
                    <nav>
                        <i class="icon-list"></i> <h2>Menu</h2> <i class="icon-list"></i>
                        <ul class="list" id="menu">
                            <li><a href="?page=wykres_silowy" target="_blank">Wykres siłowy</a></li>
                            <li><a href="?page=phpterminal" target="_blank">PHPterminal</a></li>
                        </ul>
                    </nav> 
                    <section class="links">
                        <i class="icon-pin"></i> <h2>Linkownia</h2> <i class="icon-pin"></i>
                        <ul class="list">
						<li><a href="http://mateuszkadlubowski.pl/" target="_blank">Portfolio</a></li>
                        </ul>
                    </section>
                </div>
                <main class="text">
                    <?php include $content; ?>
                </main>
            </div>
            <footer>
                Copyright 2017 &copy; Mateusz Kadłubowski - Strona domowa. <i class="icon-mail"></i>Kontakt: <a href="mailto:kontakt@mateuszkadlubowski.pl">kontakt@mateuszkadlubowski.pl</a>
            </footer>
        </div>
    </body>
	<script src="app/js/js.js" async></script>
</html>
