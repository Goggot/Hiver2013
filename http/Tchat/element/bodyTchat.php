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
    <img id="animLeftTchat1" src="images/sp2.png" />
    <img id="animRightTchat1" src="images/sp2.png" />
    <img id="animLeftTchat2" src="images/sp3.png" />
    <img id="animRightTchat2" src="images/sp3.png" />
    <img id="animLeftTchat3" src="images/sp4.png" />
    <img id="animRightTchat3" src="images/sp4.png" />
    <img id="animLeftTchat4" src="images/sp3.png" />
    <img id="animRightTchat4" src="images/sp3.png" />
    <img id="animLeftTchat5" src="images/sp4.png" />
    <img id="animRightTchat5" src="images/sp4.png" />
    <img id="animLeftTchat6" src="images/sp2.png" />
    <img id="animRightTchat6" src="images/sp2.png" />
</div>

<audio id="audio" src="sounds/gear.wav" preload="auto"></audio>