<?php
    require_once("action/ContactAction.php");
    $action = new ContactAction();
    $action->execute();
    
    require_once("element/header.php");
    require_once("element/bodyContact.php");
    require_once("element/footer.php");