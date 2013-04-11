<?php
    require_once("action/ImageAction.php");
    $action = new ImageAction();
    $action->execute();
    
    require_once("element/header.php");
    require_once("element/bodyImage.php");
    require_once("element/footer.php");