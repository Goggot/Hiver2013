<?php
    function execute(){
        if (isset($_POST["champCourriel"])){
            if ($_POST["champCourriel"] === "erwan@cvm.ca" && $_POST["champMotDePasse"] === "AAAaaa111"){
                header("location:prive.php");
                exit;
            }
        }
    }
?>