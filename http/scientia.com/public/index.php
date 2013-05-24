<?php
/**
 * Main page to the site.
 * 
 * Main page that control the inclusion of pages.
 * 
 * @author Yohan Cormier
 * @copyright 2013
 * @version 1.0
 */

if (version_compare(PHP_VERSION, '5.3.1', '<')) {
    exit('Your host needs to use PHP 5.3.1 or higher to run this application!');
}

/**
 * Constant that is checked in inclued files to prevent direct access.
 */
const INDEX_EXEC = TRUE;

function terminate() {
    exit('There are no basic files that the application needs!');
}

if (@file_exists(
        dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . 
        DIRECTORY_SEPARATOR . 'main.conf.php'
    ) && @file_exists(
        dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . 
        DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 
        'bootstrap.php')
) {
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . 
    DIRECTORY_SEPARATOR . 'main.conf.php';
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . 
    DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'bootstrap.php';
} else {
    terminate();
}
