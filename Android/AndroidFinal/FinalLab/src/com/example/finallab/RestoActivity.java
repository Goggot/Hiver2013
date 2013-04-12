package com.example.finallab;

import android.app.Activity;
import android.os.Bundle;
import android.widget.ListView;

public class RestoActivity extends Activity{
	
	ListView listeResto;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.restos);
		
		listeResto = (ListView)findViewById(R.id.listeRestos);
	}
}