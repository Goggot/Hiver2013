package com.example.finallab;

import android.content.ContentValues;
import android.content.Context;
import android.database.sqlite.SQLiteDatabase;

public class Operations {
	private DBSQLite dbsqlite;
	private SQLiteDatabase database;
	
	public Operations(Context c){
		dbsqlite = new DBSQLite(c);
	}
	
	public void openDB(Context c){
		database = dbsqlite.getWritableDatabase();
	}
	
	public void closeDB(Context c){
		database.close();
	}
	
	public void ajoutResto(Resto r){
		ContentValues cv = new ContentValues();
		cv.put("nom", r.getNom());
		cv.put("adresse", r.getAdresse());
		cv.put("tel", r.getTel());
		cv.put("description", r.getDescription());
		cv.put("prix", r.getPrix());
	}
	
	public void ajoutHotel(Hotel h){
		ContentValues cv = new ContentValues();
		cv.put("nom", h.getNom());
		cv.put("adresse", h.getAdresse());
		cv.put("tel", h.getTel());
		cv.put("description", h.getDescription());
		cv.put("prix", h.getPrix());
	}
}
