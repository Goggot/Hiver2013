<?php
    session_start();
    
    #session_unset();    #Logout
    #session_destroy();  #Logout
    
    if (!isset($_SESSION["data"])){
        $_SESSION["data"] = "Derek";
    }
    
?>