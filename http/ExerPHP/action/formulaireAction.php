<?php
    function execute(){
        $showBox=false;
        if(htmlspecialchars(isset($_GET["info"]))){
                if (strlen($_GET["info"]) > 1){
                        $showBox = true;
                        #header("location:http://perdu.com/");
                        #exit;
                }
        }
        return $showBox;
    }
?>