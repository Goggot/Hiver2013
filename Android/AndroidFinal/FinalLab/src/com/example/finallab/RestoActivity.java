package com.example.finallab;

import java.util.Hashtable;
import java.util.Vector;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.AdapterView.OnItemClickListener;

public class RestoActivity extends Activity{
	
	private ListView listeResto;
	private Vector <Hashtable<String, String>> listeItemResto = new Vector <Hashtable<String, String>>(); 
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.hotels);
		
		listeItemResto = (new Operations(this)).extraireListe("resto");
		listeResto = (ListView)findViewById(R.id.listeHotels);
		
		SimpleAdapter adapteur = new SimpleAdapter(this, listeItemResto, R.layout.canvas, new String[] {"img", "nom", "adresse"}, new int[]{R.id.imgCa, R.id.nomCa, R.id.descriptionCa});
		
		listeResto.setChoiceMode(2);
		listeResto.setTextFilterEnabled(true);
		listeResto.setAdapter(adapteur);
		
		Ecouteur ec = new Ecouteur();
		
		listeResto.setOnItemClickListener(ec);
	}
	private class Ecouteur implements OnItemClickListener{
		@Override
		public void onItemClick(AdapterView<?> parent, View itemSelec, int position, long id) {
			Intent i = new Intent(RestoActivity.this, DetailsActivity.class);
			int num = position+1;
			i.putExtra("id", String.valueOf(num)+";resto");
			startActivity(i);
		}
	}
}