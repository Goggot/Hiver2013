package com.example.exe5;

import android.os.Bundle;
import android.app.Activity;
import android.view.Menu;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;

public class MainActivity extends Activity {

	String[] tab;
	TextView reponse;
	ListView liste;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		tab = getResources().getStringArray(R.array.tab);
		reponse = (TextView)findViewById(R.id.textView1);
		liste = (ListView)findViewById(R.id.listView1);
		
		ArrayAdapter aa = new ArrayAdapter(this, android.R.layout.simple_list_item_1, tab);
		
		liste.setTextFilterEnabled(true);
		liste.setAdapter(aa);
		
		Ecouteur ec = new Ecouteur();
		
		liste.setOnItemClickListener(ec);
	}
	
	private class Ecouteur implements OnItemClickListener{

		@Override
		public void onItemClick(AdapterView<?> parent, View itemSelec, int position, long id) {
			reponse.setText(((TextView)itemSelec).getText());
		}
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}
}
