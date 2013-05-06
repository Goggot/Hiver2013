package com.example.exe2;

import android.R;
import android.os.Bundle;
import android.app.Activity;
import android.content.DialogInterface;
import android.content.DialogInterface.OnClickListener;
import android.view.Menu;
import android.widget.Button;
import android.widget.EditText;

public class Exe2 extends Activity {

	EditText champNom;
	EditText champPass;
	Button bouton;
	
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_exe2);
		
		champNom = (EditText)findViewById(R.id.editText2);
		champPass = (EditText)findViewById(R.id.);
		bouton = (Button)findViewById(R.id.button1);
		
		Ecouteur ec = new Ecouteur();
		
		bouton.setOnClickListener(ec);
	}
	
	private class Ecouteur implements OnClickListener{

		@Override
		public void onClick(DialogInterface arg0, int arg1) {
			
		}
		
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu., menu);
		return true;
	}

}
