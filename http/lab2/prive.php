<?php
    require_once("action/priveAction.php");
    $spies = execute();
    
    require_once("element/header.php");
?>

<div>
    <?php
        foreach($spies as $spy){
            ?>
                <ul>
                    <?php echo $spy; ?>
                </ul>
            <?php
        }
    ?>
    <a href="contact.php">Contactez-nous</a>
</div>

<?php
    require_once("element/footer.php");