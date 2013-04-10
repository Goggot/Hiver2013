package com.example.annexe4;

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;

public class AjouterActivity extends Activity {

	Button ajout;
	EditText text;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_ajouter);
		
		ajout = (Button)findViewById(R.id.ajout);
		text = (EditText)findViewById(R.id.editText1);
		
		Ecouteur ec = new Ecouteur();
		ajout.setOnClickListener(ec);
	}
	
	private class Ecouteur implements OnClickListener{
		@Override
		public void onClick(View v) {
			Intent i = new Intent(AjouterActivity.this, ListeActivity.class);
			i.putExtra("texte", text.getText().toString());
			startActivity(i);
		}
	}
}
