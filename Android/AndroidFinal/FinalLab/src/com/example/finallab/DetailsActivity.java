package com.example.finallab;

import java.util.Vector;

import android.app.Activity;
import android.content.Intent;
import android.graphics.drawable.Drawable;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

public class DetailsActivity extends Activity{
	
	Vector<String> listeItem;
	String id;
	TextView nom;
	TextView adresse;
	TextView tel;
	TextView description;
	TextView prix;
	ImageView img;
	Button bouton;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.details);
		
		img = (ImageView)findViewById(R.id.imageView1);
		nom = (TextView)findViewById(R.id.nom);
		adresse = (TextView)findViewById(R.id.adresse);
		prix = (TextView)findViewById(R.id.prix);
		tel = (TextView)findViewById(R.id.telephone);
		description = (TextView)findViewById(R.id.description);
		bouton = (Button)findViewById(R.id.map);
		
		id = getIntent().getStringExtra("id");
		String[] tab = id.split(";");
		
		listeItem = (new Operations(this)).extraireDetails(tab[0], tab[1]);
		
		Drawable img1;
		if (tab[1].equals("hotel")){
			if (listeItem.get(1).toString().equals("NH Muenchen Deutscher Kaiser"))
				img1 = getResources().getDrawable(R.drawable.muenchen);
			else if (listeItem.get(1).toString().equals("Sofitel Munich Bayerpost"))
				img1 = getResources().getDrawable(R.drawable.sofitel);
			else
				img1 = getResources().getDrawable(R.drawable.eurostars);
		}
		else{
			if (listeItem.get(1).toString().equals("Dallmayr"))
				img1 = getResources().getDrawable(R.drawable.dallmayr);
			else if (listeItem.get(1).toString().equals("Tantris"))
				img1 = getResources().getDrawable(R.drawable.tantris);
			else
				img1 = getResources().getDrawable(R.drawable.schuhbecks);
		}
		
		img.setImageDrawable(img1);
		nom.setText(listeItem.get(1).toString());
		adresse.setText(listeItem.get(2).toString());
		tel.setText(listeItem.get(3).toString());
		description.setText(listeItem.get(4).toString());
		prix.setText(listeItem.get(5).toString());
		
		Ecouteur ec = new Ecouteur();
		bouton.setOnClickListener(ec);
	}
	
	public class Ecouteur implements OnClickListener{
		@Override
		public void onClick(View v) {
			String recherche = "geo:0,0?q="+listeItem.get(1).toString()+", +Munich, +Allemagne";
			startActivity(new Intent(android.content.Intent.ACTION_VIEW,Uri.parse(recherche)));
		}
	}
}
