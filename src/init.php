<?php

/*
 * Configuration de l'application
 */

// error reporting - all errors for development (ensure you have display_errors = On in your php.ini file)
error_reporting(E_ALL | E_STRICT);
// Encodage avec les fonctions mb_*
mb_internal_encoding('UTF-8');
// Force le fuseau de Paris
date_default_timezone_set('Europe/Paris');

// Définition des chemins des fichiers
define('ROOT', dirname(dirname(__FILE__)));  // Racine du site en absolu
// TODO : il y a dans la doc. un second paramètre pour indiquer que l'on remonte MAIS ça ne fonctionne pas en PHP5, il faut passer à PHP7

define('DS', DIRECTORY_SEPARATOR);   // Séparateur de dossier (dépend de l'OS)
define('SRC', ROOT . DS . 'src');  // Dossier src en absolu
// Définition des URLs
define('BASEURL', dirname(dirname(dirname($_SERVER['SCRIPT_NAME']))));

// Paramètres de l'application
define('APPLINAME', 'Fredi MVC');

// Gestion de la session
//require_once SRC . DS . 'models' . DS . 'Utilisateur.php';  // Obligatoire pour tous les objets susceptibles d'être sérialisés dans la session
session_start();
@session_name('BASEL');

