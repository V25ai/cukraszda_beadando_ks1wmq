<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>Cukrászda Beadandó Weboldal</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT ?>css/main_style.css">
        <?php 
            if($viewData['style']) {
                echo '<link rel="stylesheet" type="text/css" href="'.$viewData['style'].'">';
            }
        ?>
    </head>
    <body>
        <header>
            <div id="user">
                <?php
                    if(isset($_SESSION['userlastname']) && isset($_SESSION['userfirstname'])) {
                        echo '<em>Bejelentkezett: '
                            . $_SESSION['userlastname']
                            . ' '
                            . $_SESSION['userfirstname']
                            . '</em>';
                    }
                ?>
            </div>

            <h1 class="header">Váratlan Fordulat Cukrászda</h1>
        </header>

        <nav>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
        </nav>

        <aside>
            <!--
            Az eredeti NJE/GAMF képek helyét később cukrászdás képekkel,
            logóval vagy ajánlott süteményekkel lehet feltölteni.
            -->
        </aside>

        <section>
            <?php 
                if($viewData['render']) {
                    include($viewData['render']);
                }
            ?>
        </section>

        <footer>
            &copy; Váratlan Fordulat Cukrászda <?= date("Y") ?>
        </footer>
    </body>
</html>