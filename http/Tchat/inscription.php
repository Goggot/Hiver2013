<?php
    require_once("action/InscriptionAction.php");
    $action = new InscriptionAction();
    $error = $action->executeAction();
    require_once("element/header.php");
    require_once("element/bodyInscription.php");
    require_once("element/footer.php");
