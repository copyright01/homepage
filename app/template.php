<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Moja strona domowa. Zapraszam :)" >
        <meta name="keywords" content="Strona domowa, myhomepage, homepage, mateusz, kadłubowski, mateusz kadłubowski, umk, toruń, 267532" >
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="app/css/main.css">
        <title>Strona domowa | <?php /* echo $tytul; */ ?></title>
    </head>
    <body>
        <div class="contener">

            <header>
                <div class="left-blur"></div>
                <div class="right-blur"></div> 
                <a href="?page=index">            
                    <div>
                        <h1>Strona domowa</h1>
                        <span>myhomepage.pl</span>
                    </div>
                </a>
            </header>
            <div class="content">
                <div class="side-panel">
                    <section class="priv">
                        <i class="icon-lock"></i> <h2>Strefa prywatna</h2>
                        <!--  TRESC PRIV -->
                    </section>
                    <nav>
                        <i class="icon-list"></i> <h2>Menu</h2> <i class="icon-list"></i>
                        <ul class="list" id="menu">
                            <!-- MENU <?php //echo automatyczneMenu($pages, 'menu');     ?> -->
                        </ul>
                    </nav> 
                    <section class="links">
                        <i class="icon-pin"></i> <h2>Linkownia</h2> <i class="icon-pin"></i>
                        <ul class="list">
                            <li>Linki</li>
                        </ul>
                    </section>
                </div>
                <main class="text">
                    <article>
                        Treść
                    </article>
                </main>
            </div>
            <footer>
                Copyright 2017 &copy; Mateusz Kadłubowski - Strona domowa. <i class="icon-mail"></i>Kontakt: mkadlubow@gmail.com
            </footer>
        </div>
    </body>
    <!-- SKRYPTY JS -->
</html>
