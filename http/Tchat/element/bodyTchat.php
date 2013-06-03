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
    <div id="text">
        <p id="messages"></p>
    </div>
    <p>
       <input id="conv" type="text" name="conv" onkeypress="texte(event);" />
       <button onclick="envoieMessage(null);"/>Envoyer</button>
    </p>
</div>

<div id="anim">
    <img class="spanim" id="animLeftTchat1" src="images/sp2.png" />
    <img class="spanim" id="animRightTchat1" src="images/sp2.png" />
    <img class="spanim" id="animLeftTchat2" src="images/sp3.png" />
    <img class="spanim" id="animRightTchat2" src="images/sp3.png" />
    <img class="spanim" id="animLeftTchat3" src="images/sp4.png" />
    <img class="spanim" id="animRightTchat3" src="images/sp4.png" />
    <img class="spanim" id="animLeftTchat4" src="images/sp3.png" />
    <img class="spanim" id="animRightTchat4" src="images/sp3.png" />
    <img class="spanim" id="animLeftTchat5" src="images/sp4.png" />
    <img class="spanim" id="animRightTchat5" src="images/sp4.png" />
    <img class="spanim" id="animLeftTchat6" src="images/sp2.png" />
    <img class="spanim" id="animRightTchat6" src="images/sp2.png" />
</div>