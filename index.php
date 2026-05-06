<?php

// az alkalmazás gyökér könyvtára a szerveren
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/cukraszda_beadando/');

// URL a gyökeréhez
define('SITE_ROOT', 'http://localhost/cukraszda_beadando/');

// a router.php vezérlő betöltése
require_once(SERVER_ROOT . 'controllers/' . 'router.php');

?>