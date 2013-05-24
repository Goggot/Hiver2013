<?php
    require_once("utils/morse-utils.php");
    function execute(){
        $retour = null;
        
        if (isset($_POST['ascii'])){
            $ascii = $_POST['ascii'];
            $retour = encodeMorse($ascii);
        }
        else if (isset($_POST['morse'])){
            $morse = $_POST['morse'];
            $retour = decodeMorse($morse);
        }
        return $retour;
    }
?>