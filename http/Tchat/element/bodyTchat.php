<script>
    setTimeout(verifierMembres, 1000);
    setTimeout(verifierMessages, 1000);
</script>

<div id="liste">
    <p id="membres"></p></br>
    <a href="?logout=1">Logout</a></br>
    <a href="?delete=1" style="color:red;">Delete Account</a>
</div>

<div id="tchat">
    <h1 style="text-align:center;">Tchat PHP</h1>
    <div id="text">
        <p id="messages"></p>
    </div>
        <p>
           <input id="conv" type="text" name="conv" onkeypress="texte(event);" />
           <button onclick="envoieMessage(null);"/>Envoyer</button>
        </p>
</div>