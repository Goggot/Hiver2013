package com.example.annexe4;

import java.util.Vector;

import android.os.Bundle;
import android.app.Activity;
import android.view.Menu;
import android.widget.ArrayAdapter;
import android.widget.ListView;

public class ListeActivity extends Activity {

	ListView liste;
	Vector<String> vecteur;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_liste);
		
		liste = (ListView)findViewById(R.id.liste);
		String texte = getIntent().getStringExtra("texte");
		vecteur.addElement(texte);
		ArrayAdapter a = new ArrayAdapter(this,android.R.layout.activity_list_item,);
	}
}
