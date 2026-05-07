<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MVC - PHP</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main_style.css">
        <?php if($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="'.$viewData['style'].'">'; ?>
    </head>
    <body>
        <header>
            <div id="user"><em><?= $_SESSION['userlastname']." ".$_SESSION['userfirstname'] ?></em></div>
            <h1 class="header">Web-programozás II - MVC alkalmazás</h1>
        </header>
        <nav>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>

            <ul class="menu">
                <li><a href="<?= SITE_ROOT ?>">Főoldal</a></li>
                <li><a href="<?= SITE_ROOT ?>kilepes">Kilépés</a></li>
            </ul>
        </nav>
        </main>    
            <aside>
                <h2>Cukrászda MVC</h2>

                <p>Web-programozás II beadandó</p>

                <hr>

                <p>MVC alapú webalkalmazás PHP használatával.</p>

                <p>CRUD • Session • MVC • MySQL</p>
            </aside>
            <section>
                <?php if($viewData['render']) include($viewData['render']); ?>
            </section>
        </main> 

        <footer>&copy; Váratlan Fordulat Cukrászda <?= date("Y") ?></footer>
    </body>
</html>