<?php
    function execute() {
        if (!empty($_GET["recherche"])){
            if ($_GET["recherche"]) {
                header("location:recherche.php?text=" . $_GET["recherche"]);
            }
        }
    }