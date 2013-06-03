var SCREEN_WIDTH = window.innerWidth, SCREEN_HEIGHT = window.innerHeight,
	r = 450, mouseX = 0, mouseY = 0,
	windowHalfX = window.innerWidth / 2,
	windowHalfY = window.innerHeight / 2,
	camera, scene, renderer, l1,l2,l3,l4,l5,l6,l7,l8,l9,
	compteur = 5;
var tabLigne = [l1,l2,l3,l4,l5,l6,l7,l8,l9];
	

window.onload = function(){
	init();
	animate();
	console.log(tabLigne[5]);
	$('#main').fadeIn("slow");
	$('#footer').fadeIn("slow");
	//$('div').fadeIn('normal');
}

function morph(){
	if (compteur < 10) {
		tabLigne[compteur].material.visible=true;
		compteur++;
	}
	else{
		tabLigne[5].material.visible=false;
		tabLigne[6].material.visible=false;
		tabLigne[7].material.visible=false;
		tabLigne[8].material.visible=false;
		tabLigne[9].material.visible=false;
		compteur = 5;
	}
	
	//tabLigne[1].geometry.morphTargets()
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
		parameters = [ [ 0.25, 0xff0000, 1, 2 ], [ 0.5, 0xff6600, 1, 1 ], [ 0.75, 0xff8800, 0.75, 1 ], [ 1, 0xffaa00, 0.5, 1 ], [ 1.25, 0xffffff, 0.8, 1 ],
					[ 3.0, 0xff0000, 0.75, 2 ], [ 3.5, 0xff0000, 0.5, 1 ], [ 4.5, 0xff0000, 0.25, 1 ], [ 5.5, 0xff0000, 0.125, 1 ] ],
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
		if (i >= 5){
			tabLigne[i].material.visible=false;
		}
		scene.add( tabLigne[i] );
	}

	renderer = new THREE.WebGLRenderer( { antialias: true } );
	renderer.setSize( SCREEN_WIDTH, SCREEN_HEIGHT );
	container.appendChild( renderer.domElement );

	window.addEventListener( 'resize', onWindowResize, false );
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