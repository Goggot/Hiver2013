var SCREEN_WIDTH = window.innerWidth, SCREEN_HEIGHT = window.innerHeight,
	r = 450, mouseX = 0, mouseY = 0,
	windowHalfX = window.innerWidth / 2,
	windowHalfY = window.innerHeight / 2,
	camera, scene, renderer, l1,l2,l3,l4,l5,l6,l7,l8,l9,
	compteur = 4;
var tabLigne = [l1,l2,l3,l4,l5,l6,l7,l8,l9];
var geometry;
var sens = 'up';
var color = 0;
var i = 0;

window.onload = function(){
	init();
	animate();
	console.log(tabLigne[5]);
	$('#main').fadeIn("slow");
	$('#footer').fadeIn("slow");
	$('#main').animate({height: SCREEN_HEIGHT},"slow");
	$('#main').animate({width: SCREEN_WIDTH},"slow");
	$('#connection').animate({top: SCREEN_HEIGHT/3},"slow");
	$('#connection').animate({left: SCREEN_WIDTH/3},"slow");
	$('#footer').animate({top: SCREEN_HEIGHT-50},"slow");
	$('#footer').animate({left: SCREEN_WIDTH/3},"slow");
	$('#text').animate({height: SCREEN_HEIGHT-200},"slow");
	$('#text').animate({width: SCREEN_WIDTH-500},"slow");
	$('#liste').animate({left: SCREEN_WIDTH/1.3},"slow");
}

function morph(event){
	if (event == 'XSS'){
		for (i = 0; i < 9; i++){
			tabLigne[i].material.color.setHex(0xFF0000);
		}
		setTimeout(originalColor,1000);
	}
	else{
		if (compteur < 9 && sens == 'up') {
			compteur++;
			tabLigne[compteur].material.visible=true;
			if (compteur == 8){
				sens = 'down';
			}
		}
		else if (compteur >= 5 && sens == 'down'){
			tabLigne[compteur].material.visible=false;
			compteur--;
			if (compteur == 5){
				sens = 'up';
			}
		}
	}
}

function originalColor(){
	tabLigne[0].material.color.setHex(0xFF0000);
	tabLigne[1].material.color.setHex(0xff6600);
	tabLigne[2].material.color.setHex(0xff8800);
	tabLigne[3].material.color.setHex(0xffff00);
	tabLigne[4].material.color.setHex(0xa5ef00);
	tabLigne[5].material.color.setHex(0x00CC00);
	tabLigne[6].material.color.setHex(0x1040AB);
	tabLigne[7].material.color.setHex(0x3914AF);
	tabLigne[8].material.color.setHex(0x7109AA);
}

function init() {
	var container, containerWarning;

	container = document.createElement( 'div' );
	var main = document.getElementById('main');
	document.body.insertBefore(container, main);

	camera = new THREE.PerspectiveCamera( 80, SCREEN_WIDTH / SCREEN_HEIGHT, 1, 3000 );
	camera.position.z = 1000;

	scene = new THREE.Scene();

	var i, vertex1, vertex2, material, p,
		parameters = [ [ 0.25, 0xff0000, 1, 2 ], [ 0.5, 0xff6600, 1, 1 ], [ 0.75, 0xff8800, 0.75, 1 ], [ 1, 0xffff00, 0.5, 1 ], [ 1.25, 0xa5ef00, 0.8, 1 ],
					[ 3.0, 0x00CC00, 0.75, 2 ], [ 3.5, 0x1040AB, 0.5, 1 ], [ 4.5, 0x3914AF, 0.25, 1 ], [ 5.5, 0x7109AA, 0.125, 1 ] ];
	geometry = new THREE.Geometry();

	for ( i = 0; i < 1500; i ++ ) {
		var vertex1 = new THREE.Vector4();
		vertex1.x = Math.random() * 5 - 1;
		vertex1.y = Math.random() * 5 - 1;
		vertex1.z = Math.random() * 5 - 1;
		vertex1.w = Math.random() * 5 - 1;
		vertex1.normalize();
		vertex1.multiplyScalar( r );

		vertex2 = vertex1.clone();
		vertex2.multiplyScalar( Math.random() * 0.09 + 1 );

		geometry.vertices.push( vertex1 );
		geometry.vertices.push( vertex2 );
	}
	
	for( i = 0; i < parameters.length; ++ i ) {
		p = parameters[ i ];
		material = new THREE.LineBasicMaterial( { color: p[ 1 ], opacity: p[ 2 ], linewidth: p[ 3 ] } );
		tabLigne[i] = new THREE.Line( geometry, material, THREE.LinePieces );
		tabLigne[i].scale.x = tabLigne[i].scale.y = tabLigne[i].scale.z = p[ 0 ];
		tabLigne[i].originalScale = p[ 0 ];
		tabLigne[i].rotation.y = Math.random() * Math.PI;
		tabLigne[i].updateMatrix();
		tabLigne[i].dynamic = true;

		if (i >= 5){
			tabLigne[i].material.visible=false;
		}
		scene.add( tabLigne[i] );
	}

	renderer = new THREE.WebGLRenderer( { antialias: true } );
	renderer.setSize( SCREEN_WIDTH, SCREEN_HEIGHT );
	container.appendChild( renderer.domElement );

	window.addEventListener('mousemove', onMouseMove, false);
	window.addEventListener( 'resize', onWindowResize, false );
}

function onMouseMove(event) {
	mouseX = event.clientX - windowHalfX;
	mouseY = event.clientY - windowHalfY;
}

function onWindowResize() {
	windowHalfX = window.innerWidth / 2;
	windowHalfY = window.innerHeight / 2;

	camera.aspect = window.innerWidth / window.innerHeight;
	camera.updateProjectionMatrix();

	renderer.setSize( window.innerWidth, window.innerHeight);
}

function animate() {
	requestAnimationFrame( animate );
	render();
}

function render() {
	camera.position.x += ( - mouseX + 200 - camera.position.x ) * .05;
	camera.position.y += ( - mouseY + 200 - camera.position.y ) * .05;
	camera.lookAt( scene.position );
	renderer.render( scene, camera );

	var time = Date.now() * 0.0001;

	for ( var i = 0; i < scene.children.length; i ++ ) {
		var object = scene.children[ i ];

		if ( object instanceof THREE.Line ) {
			object.rotation.y = time * ( i < 4 ? ( i + 1 ) : - ( i + 1 ) );
			object.rotation.x = time * ( i < 4 ? ( i + 1 ) : - ( i + 1 ) );
		}
	}
}