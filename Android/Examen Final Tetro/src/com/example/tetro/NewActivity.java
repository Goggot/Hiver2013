package com.example.tetro;

import android.app.Activity;
import android.os.Bundle;
import android.widget.TextView;

public class NewActivity extends Activity {
	
	TextView points;
	TextView argent;
	Operations op;
	private int nbPoints;
	private double mtArgent;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_new);
		
		op = new Operations(this);
		points = (TextView)findViewById(R.id.newPoints);
		argent = (TextView)findViewById(R.id.newArgent);
		
		nbPoints = op.totalPoints();
		
		if (nbPoints > 500){
			mtArgent = 4;
		}
		else {
			mtArgent = (double)(nbPoints*0.008);
		}
		
		points.setText(String.valueOf(nbPoints)+" points");
		argent.setText(String.valueOf(mtArgent)+" $");
	}
}
