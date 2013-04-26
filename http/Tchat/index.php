<?php
    require_once("action/IndexAction.php");
    $action = new IndexAction();
    $error = $action->executeAction();
    require_once("element/header.php");
    require_once("element/bodyIndex.php");
    require_once("element/footer.php");
