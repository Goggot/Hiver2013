<?php
    $recherche = null;
    require_once("action/indexAction.php");
    execute();
    require_once("element/header.php");
?>


    <div id="principal">
        <div id="img"></div>
        <h3>L'engin de recherche par excellence !</h3>
        
        <form action="index.php" method="get">
            <textarea name="recherche"></textarea>
            <input id="bouton" type="submit" value="Rechercher !" />
        </form>
    </div>


<?php
    require_once("element/footer.php");