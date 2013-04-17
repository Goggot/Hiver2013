package com.example.finallab;

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class MainActivity extends Activity {

	Button bResto;
	Button bHotel;
	Operations operation = new Operations(this);
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		bResto = (Button)findViewById(R.id.buttonResto);
		bHotel = (Button)findViewById(R.id.buttonHotel);
		
		Ecouteur ec = new Ecouteur();
		
		bResto.setOnClickListener(ec);
		bHotel.setOnClickListener(ec);
	}
	
	public class Ecouteur implements OnClickListener{
		@Override
		public void onClick(View v){
			if (v.getId() == R.id.buttonHotel){
				Intent i = new Intent(MainActivity.this, HotelActivity.class);
				startActivity(i);
			}
			else{
				Intent i = new Intent(MainActivity.this, RestoActivity.class);
				startActivity(i);
			}
		}
	}
}
