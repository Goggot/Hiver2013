<?php
    require_once("action/TchatAction.php");
    $action = new TchatAction();
    $action->executeAction();
    require_once("element/header.php");
    require_once("element/bodyTchat.php");
    require_once("element/footer.php");