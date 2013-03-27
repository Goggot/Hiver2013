<?php
    require_once("actions/indexAction.php");
    $text = execute();
    require_once("element/header.php");
?>
    <h1>
	    Outils de conversion Morse-ASCII
    </h1>
    <?php if($text == null){
        ?>
        <form action="index.php" method="post">
            <p>Transformation vers le morse</p>
            <textarea name="ascii" id="ascii"><?php echo $text ?></textarea>
            <p>Transformation vers l'ASCII</p>
            <textarea name="morse" id="morse"><?php echo $text ?></textarea>
            <input type="submit" value="Transformer" />
        </form>
    <?php
    }
        else {
            echo $text;
    ?>
            <div></div>
            <a href="index.php?ascii=null&morse=null">Retour</a>
    <?php } ?>
    
<?php
    require_once("element/footer.php");