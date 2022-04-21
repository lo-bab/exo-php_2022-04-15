<?php
// démarrage de session
session_start();

// le code ci-dessous agit comme un router très simpliste

// récupère le/les répertoire(s) à partir de localhost pour définir la racine du site
define('SITEBASE', rtrim('/' . ltrim($_SERVER['SCRIPT_FILENAME'], $_SERVER['DOCUMENT_ROOT']), 'index.php'));

// récupère le PATH du site
define('SITEPATH', dirname(__dir__) . DIRECTORY_SEPARATOR . 'exo-php_2022-04-15/');

// répertoire qui contient tous les fichiers de fonctions que l'on veut mettre en inclusion
//(pratique si on veut séparer les fonctions dans plusieurs fichiers sinon autant inclure directement le fichier)
require 'includes.php';

if ($_SERVER['REQUEST_URI'] === SITEBASE . '' || $_SERVER['REQUEST_URI'] === SITEBASE . 'home') {

    // variables de page
    $title = 'Accueil';
    $page =  __DIR__ . '/pages/home.php';

} elseif ($_SERVER['REQUEST_URI'] === SITEBASE . 'contact') {

    // variables de page
    $title = 'Contact';
    $page = __DIR__ . '/pages/contact.php';
        
} elseif ($_SERVER['REQUEST_URI'] === SITEBASE . 'glacier') {

    // variables de page
    $title = 'Le glacier';
    $page = __DIR__ . '/pages/glacier.php';

} elseif ($_SERVER['REQUEST_URI'] === SITEBASE . 'guess') {

    // variables de page
    $title = 'Devines';
    $page = __DIR__ . '/pages/guess.php';

} elseif ($_SERVER['REQUEST_URI'] === SITEBASE . 'menu') {

    // variables de page
    $title = 'Menu';
    $page = __DIR__ . '/pages/menu.php';

} else {

    // variables de page
    $title = 'Oops';
    http_response_code(404);
    $page = __DIR__ . '/pages/404.php';

}

// le code ci-dessous génère un template dont le contenu de page change dynamiquement
require 'header.php';
require $page;
require 'footer.php';

// efface les alertes affichées au changement de page
unset($_SESSION['alerts']);
