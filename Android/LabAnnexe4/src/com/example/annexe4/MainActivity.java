package com.example.annexe4;

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class MainActivity extends Activity {

	Button ajout;
	Button affiche;
	Button quitter;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		ajout = (Button)findViewById(R.id.ajouter);
		affiche = (Button)findViewById(R.id.afficher);
		quitter = (Button)findViewById(R.id.quitter);
		
		Ecouteur ec = new Ecouteur();
		ajout.setOnClickListener(ec);
		affiche.setOnClickListener(ec);
		quitter.setOnClickListener(ec);
	}
	
	private class Ecouteur implements OnClickListener{
		@Override
		public void onClick(View v) {
			if (v.getId() == R.id.ajouter){
				Intent i = new Intent(MainActivity.this, AjouterActivity.class);
				startActivity(i);
			}
			else if (v.getId() == R.id.afficher){
				Intent i = new Intent(MainActivity.this, ListeActivity.class);
				startActivity(i);
			}
			else{
				finish();
			}
		}
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.activity_main, menu);
		return true;
	}
}
