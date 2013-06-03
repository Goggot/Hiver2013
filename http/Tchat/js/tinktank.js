var tempsMachine = 30000;

window.onload = function(){
	$('#main').fadeIn("slow");
	$('#footer').fadeIn("slow");
	animateLeft();
	animateRight();
	play();
}

function animateLeft(){
	$('#animLeftAccueil1').transition({rotate: '-500deg'},tempsMachine);
	$('#animLeftAccueil1').transition({rotate: '500deg'},tempsMachine);

	$('#animLeftAccueil2').transition({rotate: '800deg'},tempsMachine);
	$('#animLeftAccueil2').transition({rotate: '-800deg'},tempsMachine);

	$('#animLeftAccueil3').transition({rotate: '-600deg'},tempsMachine);
	$('#animLeftAccueil3').transition({rotate: '600deg'},tempsMachine);

	$('#animLeftAccueil4').transition({rotate: '500deg'},tempsMachine);
	$('#animLeftAccueil4').transition({rotate: '-500deg'},tempsMachine);

	$('#animLeftAccueil5').transition({rotate: '-450deg'},tempsMachine);
	$('#animLeftAccueil5').transition({rotate: '450deg'},tempsMachine);

	$('#animLeftAccueil6').transition({rotate: '500deg'},tempsMachine);
	$('#animLeftAccueil6').transition({rotate: '-500deg'},tempsMachine);


	$('#animLeftTchat1').transition({rotate: '-500deg'},tempsMachine);
	$('#animLeftTchat1').transition({rotate: '500deg'},tempsMachine);

	$('#animLeftTchat2').transition({rotate: '800deg'},tempsMachine);
	$('#animLeftTchat2').transition({rotate: '-800deg'},tempsMachine);

	$('#animLeftTchat3').transition({rotate: '-600deg'},tempsMachine);
	$('#animLeftTchat3').transition({rotate: '600deg'},tempsMachine);

	$('#animLeftTchat4').transition({rotate: '500deg'},tempsMachine);
	$('#animLeftTchat4').transition({rotate: '-500deg'},tempsMachine);

	$('#animLeftTchat5').transition({rotate: '-450deg'},tempsMachine);
	$('#animLeftTchat5').transition({rotate: '450deg'},tempsMachine);

	$('#animLeftTchat6').transition({rotate: '500deg'},tempsMachine);
	$('#animLeftTchat6').transition({rotate: '-500deg'},tempsMachine);

	setTimeout(animateLeft, 10000);
}


function animateRight(){
	$('#animRightAccueil1').transition({rotate: '500deg'},tempsMachine);
	$('#animRightAccueil1').transition({rotate: '-500deg'},tempsMachine);

	$('#animRightAccueil2').transition({rotate: '-800deg'},tempsMachine);
	$('#animRightAccueil2').transition({rotate: '800deg'},tempsMachine);

	$('#animRightAccueil3').transition({rotate: '600deg'},tempsMachine);
	$('#animRightAccueil3').transition({rotate: '-600deg'},tempsMachine);

	$('#animRightAccueil4').transition({rotate: '-500deg'},tempsMachine);
	$('#animRightAccueil4').transition({rotate: '500deg'},tempsMachine);

	$('#animRightAccueil5').transition({rotate: '450deg'},tempsMachine);
	$('#animRightAccueil5').transition({rotate: '-450deg'},tempsMachine);

	$('#animRightAccueil6').transition({rotate: '-500deg'},tempsMachine);
	$('#animRightAccueil6').transition({rotate: '500deg'},tempsMachine);


	$('#animRightTchat1').transition({rotate: '500deg'},tempsMachine);
	$('#animRightTchat1').transition({rotate: '-500deg'},tempsMachine);

	$('#animRightTchat2').transition({rotate: '-800deg'},tempsMachine);
	$('#animRightTchat2').transition({rotate: '800deg'},tempsMachine);

	$('#animRightTchat3').transition({rotate: '600deg'},tempsMachine);
	$('#animRightTchat3').transition({rotate: '-600deg'},tempsMachine);

	$('#animRightTchat4').transition({rotate: '-500deg'},tempsMachine);
	$('#animRightTchat4').transition({rotate: '500deg'},tempsMachine);

	$('#animRightTchat5').transition({rotate: '450deg'},tempsMachine);
	$('#animRightTchat5').transition({rotate: '-450deg'},tempsMachine);

	$('#animRightTchat6').transition({rotate: '-500deg'},tempsMachine);
	$('#animRightTchat6').transition({rotate: '500deg'},tempsMachine);

	setTimeout(animateRight, 10000);
}