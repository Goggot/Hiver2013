package com.example.finallab;

import java.util.Hashtable;
import java.util.Vector;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.SimpleAdapter;

public class HotelActivity extends Activity{
	
	private ListView listeHotel;
	private Vector <Hashtable<String, String>> listeItemHotel = new Vector <Hashtable<String, String>>(); 
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.hotels);
		
		listeItemHotel = (new Operations(this)).extraireListe("hotel");
		listeHotel = (ListView)findViewById(R.id.listeHotels);
		
		SimpleAdapter adapteur = new SimpleAdapter(this, listeItemHotel, R.layout.canvas, new String[] {"img", "nom", "adresse"},new int[]{R.id.imgCa, R.id.nomCa, R.id.descriptionCa} );
		
		listeHotel.setChoiceMode(2);
		listeHotel.setTextFilterEnabled(true);
		listeHotel.setAdapter(adapteur);
		
		Ecouteur ec = new Ecouteur();
		
		listeHotel.setOnItemClickListener(ec);
	}
	private class Ecouteur implements OnItemClickListener{
		@Override
		public void onItemClick(AdapterView<?> parent, View itemSelec, int position, long id) {
			Intent i = new Intent(HotelActivity.this, DetailsActivity.class);
			int num = position+1;
			i.putExtra("id", String.valueOf(num)+";hotel");
			startActivity(i);
		}
	}
}