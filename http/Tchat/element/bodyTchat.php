<p><?php if(isset($_SESSION["loggedIn"]) &&  ?></p>
<div id="tchat">
    <form action="tchat.php" method="post">
            <p>
               <input type="text" name="conv" />
               <input type="submit" value="Valider" />
            </p>
    </form>
</div>