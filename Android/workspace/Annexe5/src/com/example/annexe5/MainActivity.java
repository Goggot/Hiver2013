package com.example.annexe5;

import android.os.Bundle;
import android.app.Activity;
import android.content.DialogInterface;
import android.content.DialogInterface.OnKeyListener;
import android.view.KeyEvent;
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.EditText;
import android.widget.TextView;

public class MainActivity extends Activity {

	TextView nom;
	TextView moyenne;
	TextView arena;
	EditText reponse;
	
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		nom = (TextView)findViewById(R.id.reponseNomArena);
		moyenne = (TextView)findViewById(R.id.reponseMoyenne);
		arena = (TextView)findViewById(R.id.reponseArena);
		reponse = (EditText)findViewById(R.id.reponse);
		
		Ecouteur ec = new Ecouteur();
		KeyEcouteur kc = new KeyEcouteur();
		
		nom.setOnClickListener(ec);
		moyenne.setOnClickListener(ec);
		arena.setOnClickListener(ec);
		reponse.setOnKeyListener(kc);
	}
	
	private class Ecouteur implements OnClickListener {
		@Override
		public void onClick(View v) {
			
		}
	}
	
	private class KeyEcouteur implements OnKeyListener {

		@Override
		public boolean onKey(DialogInterface arg0, int arg1, KeyEvent arg2) {
			// TODO Auto-generated method stub
			return false;
		}
		
	}
}
