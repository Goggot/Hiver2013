<?php
    require_once("action/ModifAction.php");
    $action = new ModifAction();
    $action->execute();
    
    require_once("element/header.php");
    require_once("element/bodyModif.php");
    require_once("element/footer.php");