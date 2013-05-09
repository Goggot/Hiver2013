package com.example.tetro;

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
	
	public int totalPoints(){
		int nbPoints = 0;
		String temp;
		Cursor c = database.rawQuery("SELECT nbpoints FROM points;", null);
		c.moveToFirst();
		
		while(!c.isAfterLast()){
			temp = c.getString(0);
			Log.i("ERWAN", temp);
			nbPoints += Integer.parseInt(temp);
			c.moveToNext();
		}
		
		return nbPoints;
	}
	
	public void insertion(String dateP, String pointsP){
		ContentValues cv = new ContentValues();
		cv.put("date", dateP);
		cv.put("nbpoints", pointsP);
		
		database.insert("points",null,cv);
	}
}
