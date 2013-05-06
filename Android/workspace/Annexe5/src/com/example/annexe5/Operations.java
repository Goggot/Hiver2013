package com.example.annexe5;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

public class Operations {
	private DataBaseHelperSQLite databaseHelper;
	private SQLiteDatabase database;
	
	public Operations(Context c){
		databaseHelper = new DataBaseHelperSQLite(c);
	}
	
	public void ouvrirBD(){
		database = databaseHelper.getWritableDatabase();
	}
	
	public void fermerBD(){
		database.close();
	}
	
	public void ajouterEquipe(Equipes e){
		ContentValues cv = new ContentValues();
		cv.put("nom", e.getNom());
		cv.put("division", e.getDivision());
		cv.put("arena", e.getArena());
		cv.put("capacite", e.getCapacite());
		
		database.insert("equipes",null,cv);
	}
	
	public String nomArenaPremier(){
		Cursor c = database.rawQuery("SELECT arena FROM equipes", null);
		c.moveToFirst();
		String arena = c.getString(0);
		return arena;
	}
	
	public double moyenne(){
		Cursor c = database.rawQuery("SELECT capacite FROM equipes", null);
		c.moveToFirst();
		int moyenne = 0;
		int count = 0;
		
		while(!c.isAfterLast()){
			moyenne += c.getInt(0);
			count++;
		}
		
		return (moyenne/count);
	}
	
	public String rechercheEquipe(String arena){
		String[] reponse = new String[1];
		Cursor c = database.rawQuery("SELECT nom FROM equipes WHERE arena = %arena;", reponse);
		c.moveToFirst();
		return c.getString(0);
	}
}
