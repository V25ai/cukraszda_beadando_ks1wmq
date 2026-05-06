<?php

class Menu {
    public static $menu = array();

    public static function setMenu() {
        self::$menu = array();

        $connection = Database::getConnection();

        if(!isset($_SESSION['userlevel'])) {
            $_SESSION['userlevel'] = 0;
        }

        $stmt = $connection->prepare(
            "SELECT url, nev, szulo, jogosultsag 
             FROM menu 
             WHERE jogosultsag <= :userlevel 
             ORDER BY sorrend"
        );

        $stmt->execute(array(
            ':userlevel' => $_SESSION['userlevel']
        ));

        while($menuitem = $stmt->fetch(PDO::FETCH_ASSOC)) {
            self::$menu[$menuitem['url']] = array(
                $menuitem['nev'],
                $menuitem['szulo'],
                $menuitem['jogosultsag']
            );
        }
    }

    public static function getMenu($sItems) {
        $submenu = "";

        $menu = "<ul class=\"menu\">";

        foreach(self::$menu as $menuindex => $menuitem) {
            if($menuitem[1] == 0 || $menuitem[1] == "") {
                $menu .= "<li><a href='".SITE_ROOT.$menuindex."' "
                    . ($menuindex == $sItems[0] ? "class='selected'" : "")
                    . ">".$menuitem[0]."</a></li>";
            }
            else if($menuitem[1] == $sItems[0]) {
                $submenu .= "<li><a href='".SITE_ROOT.$sItems[0]."/".$menuindex."' "
                    . ($menuindex == $sItems[1] ? "class='selected'" : "")
                    . ">".$menuitem[0]."</a></li>";
            }
        }

        $menu .= "</ul>";

        if($submenu != "") {
            $submenu = "<ul class=\"menu\">".$submenu."</ul>";
        }

        return $menu.$submenu;
    }
}

Menu::setMenu();

?>