<?php
    require_once("actions/indexAction.php");
    execute();
    require_once("element/header.php");
?>

<form action="index.php" method="post">
    <input type="text" name="text" />
    <input type="submit" value="Ajouter" />
    <a href="index.php?clear=true" >Vider la liste</a>
</form>

<?php
    foreach ($_SESSION["table"] as $i) {
        echo '<div class="postit">' . $i . '</div>';
    }
?>

<?php
    require_once("element/footer.php");