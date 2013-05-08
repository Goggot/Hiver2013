<?php
    $text = $_GET["recherche"];
    require_once("action/indexAction.php");
    execute();
    
    require_once("element/header.php");
?>

<div id="img2"></div>
<?php echo $text; ?>

<?php
    require_once("element/footer.php");