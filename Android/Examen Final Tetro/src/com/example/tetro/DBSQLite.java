package com.example.tetro;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class DBSQLite extends SQLiteOpenHelper{

	public DBSQLite(Context context) {
		super(context, "Tetro1", null, 1);
	}
	
	@Override
	public void onCreate(SQLiteDatabase db) {
		db.execSQL("CREATE TABLE points (_id INTEGER PRIMARY KEY AUTOINCREMENT, date TEXT, nbpoints INTEGER);");
	}

	@Override
	public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
		db.execSQL("DROP TABLE IF EXIST points");
		onCreate(db);
	}
}