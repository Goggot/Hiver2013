package com.example.finallab;

import java.util.Hashtable;
import java.util.Vector;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.util.Log;

public class Operations {
	private DBSQLite dbsqlite;
	private SQLiteDatabase database;
	
	public Operations(Context c){
		dbsqlite = new DBSQLite(c);
		openDB();
	}
	
	public void openDB(){
		database = dbsqlite.getWritableDatabase();
	}
	
	public void closeDB(){
		database.close();
	}
	
	public void ajoutResto(Resto r){
		ContentValues cv = new ContentValues();
		cv.put("nom", r.getNom());
		cv.put("adresse", r.getAdresse());
		cv.put("tel", r.getTel());
		cv.put("description", r.getDescription());
		cv.put("prix", r.getPrix());
		
		database.insert("restos",null,cv);
	}
	
	public void ajoutHotel(Hotel h){
		ContentValues cv = new ContentValues();
		cv.put("nom", h.getNom());
		cv.put("adresse", h.getAdresse());
		cv.put("tel", h.getTel());
		cv.put("description", h.getDescription());
		cv.put("prix", h.getPrix());
		
		database.insert("hotels",null,cv);
	}
	
	public void fillDB(){
		Log.i("Erwan", "fillDB PASSED");
		ajoutHotel(new Hotel("NH Muenchen Deutscher Kaiser",
							"Arnulfstrasse 2, Munchen, D - 80335, Allemagne", 
							"49 88 95 45 30", 
							"Cet original edifice datant de 1920 a ete agrandi dans les annees 60 avec une tour de 13 etages en complement des trois etages d'origine. edifice le plus eleve du quartier, l'hotel offre une vue magnifique sur Munich depuis la plupart des chambres.", 
							"100$"));
		Log.i("Erwan", "1er ajout");
		ajoutHotel(new Hotel("Sofitel Munich Bayerpost", 
							"Bayerstrasse 12, 80335 Muenchen Allemagne", 
							"0 69 95 30 75 94", 
							"Construit dans le style wilhelmien, notre hotel 5 etoiles allie hospitalite de qualite, architecture interieure d'avant-garde et decoration suivant l'art de vivre francais. Venez decouvrir l'un des plus beaux hotels munichois dans toute sa splendeur.", 
							"254$"));
		Log.i("Erwan", "2eme ajout");
		ajoutHotel(new Hotel("Eurostars Grand Central", 
							"Arnulfstr. 35, Munich, BY 80636 Allemagne ", 
							"08 25 21 33 72", 
							"Avant-garde. Style. Architecture innovante. Plus de 16 000 metres carres de confort et de design. 257 chambres. 8 suites. Lits XXL. Salles de bain XXL. 10 appartements de long sejour. Restaurant d'une capacitee de plus d'une centaine de personnes. Quatre salles de conferences d'un total de 700 metres carres et d'une capacite de 10 a 350 personnes, selon vos besoins. Bain turc. Piscine interieure. Gymnase. Sauna. ", 
							"109$"));
		Log.i("Erwan", "3eme ajout");
		ajoutResto(new Resto("Dallmayr", 
							"Dienerstr 14 D - 80331 Munchen", 
							"08 92 13 51 00", 
							"While it is all hustle and bustle amid the heavily laden shelves of the delicatessen downstairs, on the first floor chef Diethard Urbansky reinvents classics dishes including calvese kidneys and pears Belle Helene. For the perfect wine recommendation (there are a fine selection of Rieslings) who better than sommelier Andrej Grunert?", 
							"130$"));
		Log.i("Erwan", "4eme ajout");
		ajoutResto(new Resto("Tantris", 
							"Johann-Fichte-Str. 7 D - 80805 Schwabing", 
							"08 93 61 95 90", 
							"Tantris has become as renowned for its legendary 1970s charm as it is for Hans Haases classic cuisine. His guests enthusiasm for his undisputed culinary skills remains as keen as it ever was.", 
							"100$"));
		Log.i("Erwan", "5eme ajout");
		ajoutResto(new Resto("Schuhbecks in den Sedtiroler Stuben", 
							"Platzl 6 D - 80331 Munchen", 
							"08 92 16 69 00", 
							"The atmosphere at the Platzl Hotel is pleasant and lively and this feeling extends into Alfons Schuhbeckes elegant Alpine restaurant. Patrick Raad offers two menus ('Schuhbeckes Classics' and 'World of Spices'). Next door, the restaurantes own shops sell ice cream, chocolate, spices and wine.", 
							"75$"));
		Log.i("Erwan", "6eme ajout");
	}
	
	public Vector <Hashtable<String, String>> extraireListe(String etablissement){
		Cursor eta;
		Vector <Hashtable<String, String>> listeItem = new Vector <Hashtable<String, String>>();
		Hashtable <String, String> item;
		String img = new String();
		
		if (etablissement == "hotel"){
			eta = database.rawQuery("SELECT * FROM hotels", null);
			eta.moveToFirst();
			if (eta.getString(2).equals("NH Muenchen Deutscher Kaiser"))
				img = String.valueOf(R.drawable.muenchen);
			else if (eta.getString(2).equals("Sofitel Munich Bayerpost"))
				img = String.valueOf(R.drawable.sofitel);
			else
				img = String.valueOf(R.drawable.eurostars);
		}
		else{
			eta = database.rawQuery("SELECT * FROM restos", null);
			eta.moveToFirst();
			if (eta.getString(2).equals("Dallmayr"))
				img = String.valueOf(R.drawable.dallmayr);
			else if (eta.getString(2).equals("Tantris"))
				img = String.valueOf(R.drawable.tantris);
			else
				img = String.valueOf(R.drawable.schuhbecks);
		}
		
		while (!eta.isAfterLast()){
			item = new Hashtable <String, String>();
			item.put("img", img);
			item.put("nom", eta.getString(1));
			item.put("adresse", eta.getString(2));
			listeItem.add(item);
			eta.moveToNext();
		}
		Log.i("Erwan", "Liste remplie");
		return listeItem;
	}
	
	public Vector <String> extraireDetails(String id, String etablissement){
		Cursor eta;
		Vector<String> listeItem = new Vector <String>();
		String img = new String();
		String[] reponse = new String[]{id};

		if (etablissement.equals("hotel")){
			eta = database.rawQuery("SELECT * FROM hotels WHERE _id = ?", reponse);
			eta.moveToFirst();
		}
		else{
			eta = database.rawQuery("SELECT * FROM restos WHERE _id = ?", reponse);
			eta.moveToFirst();
		}

		listeItem.add(eta.getString(0).toString());
		listeItem.add(eta.getString(1).toString());
		listeItem.add(eta.getString(2).toString());
		listeItem.add(eta.getString(3).toString());
		listeItem.add(eta.getString(4).toString());
		listeItem.add(eta.getString(5).toString());

		return listeItem;
	}
}