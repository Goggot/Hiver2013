package com.example.examen_q9;

import java.util.List;

import android.os.Bundle;
import android.app.Activity;
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;

public class MainActivity extends Activity {

	ImageView drapeau;
	TextView pays;
	ListView listeView;
	String[] listePays = {"France","Argentine","Allemagne","Italie"};
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		drapeau = (ImageView)findViewById(R.id.imageView1);
		pays = (TextView)findViewById(R.id.textView1);
		listeView = (ListView)findViewById(R.id.listePays);
		SimpleAdapter sa = new SimpleAdapter(this, android.R.layout.simple_list_item_1, 0, listePays);
		Ecouteur ec = new Ecouteur();
		listeView.setOnItemClickListener(ec);
	}

	public class Ecouteur implements OnItemClickListener{

		@Override
		public void onItemClick(AdapterView<?> arg0, View arg1, int arg2, long arg3) {
			
		}
		
	}
	
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.activity_main, menu);
		return true;
	}
}
