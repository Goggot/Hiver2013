package com.example.tetro;

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;

public class MainActivity extends Activity {

	EditText date;
	EditText points;
	Button bouton;
	Operations op;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		op = new Operations(this);
		date = (EditText)findViewById(R.id.editDate);
		points = (EditText)findViewById(R.id.editPoints);
		bouton = (Button)findViewById(R.id.button1);
		
		Ecouteur ec = new Ecouteur();
		bouton.setOnClickListener(ec);
	}
	
	public class Ecouteur implements OnClickListener{
		@Override
		public void onClick(View v) {
			try{
				op.insertion(date.getText().toString(), points.getText().toString());
				Intent i = new Intent(MainActivity.this, NewActivity.class);
				startActivity(i);
			}
			catch(NullPointerException e){
				Log.i("ERWAN", "Vartiable vide");
			}
			catch(NumberFormatException nfe){
				Log.i("ERWAN", "Vartiable vide");
			}
		}
	}
}
