<?php

Class Menu {
    public static $menu = array();

    public static function setMenu() {
        self::$menu = array();

        if(!isset($_SESSION['userlevel']) || $_SESSION['userlevel'] == "") {
            $_SESSION['userlevel'] = "1__";
        }

        $connection = Database::getConnection();

        $sql = "select url, nev, szulo, jogosultsag 
                from menu 
                where :userlevel like jogosultsag 
                order by sorrend";

        $stmt = $connection->prepare($sql);
        $stmt->execute(array(
            "userlevel" => $_SESSION['userlevel']
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
            if(empty($menuitem[1]) || $menuitem[1] == 0) {
                $menu .= "<li><a href='".SITE_ROOT.$menuindex."' "
                    .($menuindex == $sItems[0] ? "class='selected'" : "")
                    .">".$menuitem[0]."</a></li>";
            }
            else if($menuitem[1] == $sItems[0]) {
                $submenu .= "<li><a href='".SITE_ROOT.$sItems[0]."/".$menuindex."' "
                    .($menuindex == $sItems[1] ? "class='selected'" : "")
                    .">".$menuitem[0]."</a></li>";
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