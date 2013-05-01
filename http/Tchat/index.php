<?php
    require_once("action/IndexAction.php");
    $action = new IndexAction();
    $action->execute();
    require_once("element/header.php");
    require_once("element/bodyIndex.php");
    require_once("element/footer.php");
