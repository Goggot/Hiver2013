package com.example.exe4;

import android.os.Bundle;
import android.app.Activity;
import android.content.DialogInterface;
import android.content.DialogInterface.OnClickListener;
import android.view.Gravity;
import android.view.Menu;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.RadioGroup;
import android.widget.RadioGroup.OnCheckedChangeListener;

public class Exe4 extends Activity {

	RadioGroup groupe1;
	RadioGroup groupe2;
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_exe4);
		
		groupe1 = (RadioGroup)findViewById(R.id.radioGroup1);
		groupe2 = (RadioGroup)findViewById(R.id.radioGroup2);
		
		Ecouteur ec = new Ecouteur();
		
		groupe1.setOnCheckedChangeListener(ec);
	}
	
	private class Ecouteur implements OnCheckedChangeListener{
		@Override
		public void onCheckedChanged(RadioGroup groupe, int id) {
			if (groupe == groupe1) {
				if (id == R.id.hor) {
					groupe1.setOrientation(LinearLayout.HORIZONTAL);
				}
				else {
					groupe1.setOrientation(LinearLayout.VERTICAL);
				}
			}
			else {
				if (id == R.id.gau) {
					groupe2.setGravity(Gravity.LEFT);
				}
				else if (id == R.id.dro) {
					groupe2.setGravity(Gravity.RIGHT);
				}
				else {
					groupe2.setGravity(Gravity.CENTER);
				}
			}
		}
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.exe4, menu);
		return true;
	}

}
