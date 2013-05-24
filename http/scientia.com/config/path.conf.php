<?php
/**
 * The configuration file how defines path of directories.
 */

$absolute_path = array(
    'media.js' => PATH_MEDIA . 'js' . DIRECTORY_SEPARATOR,
    'media.js.addons' => PATH_MEDIA . 'js' . DIRECTORY_SEPARATOR . 'addons' . 
        DIRECTORY_SEPARATOR,
    'media.js.libs' => PATH_MEDIA . 'js' . DIRECTORY_SEPARATOR . 'libs' . 
        DIRECTORY_SEPARATOR,
    'media.css' => PATH_MEDIA . 'css' . DIRECTORY_SEPARATOR,
    'media.css.fonts' => PATH_MEDIA . 'css' . DIRECTORY_SEPARATOR . 'fonts' . 
        DIRECTORY_SEPARATOR,
    'media.css.others' => PATH_MEDIA . 'css' . DIRECTORY_SEPARATOR . 'others' . 
        DIRECTORY_SEPARATOR,
    'media.css.print' => PATH_MEDIA . 'css' . DIRECTORY_SEPARATOR . 'print' . 
        DIRECTORY_SEPARATOR,
    'media.css.screen' => PATH_MEDIA . 'css' . DIRECTORY_SEPARATOR . 'screen' . 
        DIRECTORY_SEPARATOR,
    'media.icons' => PATH_MEDIA . 'icons' . DIRECTORY_SEPARATOR,
    'media.imgs' => PATH_MEDIA . 'imgs' . DIRECTORY_SEPARATOR,
    'app.components' => PATH_APP . 'components' . DIRECTORY_SEPARATOR,
    'app.configs' => PATH_APP . 'configs' . DIRECTORY_SEPARATOR,
    'app.default' => PATH_APP . 'default' . DIRECTORY_SEPARATOR,
    'app.functions' => PATH_APP . 'functions' . DIRECTORY_SEPARATOR,
    'app.models' => PATH_APP . 'models' . DIRECTORY_SEPARATOR,
    'app.modules' => PATH_APP . 'modules' . DIRECTORY_SEPARATOR,
    'app.plugins' => PATH_APP . 'plugins' . DIRECTORY_SEPARATOR,
    'var.cache' => PATH_VAR . 'cache' . DIRECTORY_SEPARATOR,
    'var.lock' => PATH_VAR . 'lock' . DIRECTORY_SEPARATOR,
    'var.logs' => PATH_VAR . 'logs' . DIRECTORY_SEPARATOR,
    'var.sessions' => PATH_VAR . 'sessions' . DIRECTORY_SEPARATOR,
    'var.tmp' => PATH_VAR . 'tmp' . DIRECTORY_SEPARATOR,
    'var.uploads' => PATH_VAR . 'uploads' . DIRECTORY_SEPARATOR,
    'var.views_compiles' => PATH_VAR . 'views_compiles' . DIRECTORY_SEPARATOR,
);

$relative_path = array(
    'media' => URL_SITE . 'media/',
    'media.js' => URL_SITE . 'media/js/',
    'media.js.addons' => URL_SITE . 'media/js/addons/',
    'media.js.libs' => URL_SITE . 'media/js/libs/',
    'media.css' => URL_SITE . 'media/css',
    'media.css.fonts' => URL_SITE . 'media/css/fonts',
    'media.css.others' => URL_SITE . 'media/css/others',
    'media.css.print' => URL_SITE . 'media/css/print',
    'media.css.screen' => URL_SITE . 'media/css/screen',
    'media.icons' => URL_SITE . 'media/icons',
    'media.imgs' => URL_SITE . 'media/imgs',
);
