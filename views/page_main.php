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
            <div id="user">
                <em>
                    <?php
                        if(isset($_SESSION['userid']) && $_SESSION['userid'] != 0) {
                            echo "Bejelentkezett: "
                                .$_SESSION['userlastname']." "
                                .$_SESSION['userfirstname'];

                            if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
                                echo " (".$_SESSION['username'].")";
                            }
                        }
                    ?>
                </em>
            </div>

            <h1 class="header">Web-programozás II - MVC alkalmazás</h1>
        </header>

        <nav>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>            
        </nav>

        <main>    
            <aside>
                <h2>Cukrászda MVC</h2>

                <p>Web-programozás LA-02 beadandó</p>

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