<?php
    session_start();
    
    if (!isset($_SESSION["table"])){
        $_SESSION["table"] = [];
    }
    
    function execute(){
        if (!empty($_POST["text"])) {
            $text = $_POST["text"];
            $_SESSION["table"][] = $text;
        }
    }