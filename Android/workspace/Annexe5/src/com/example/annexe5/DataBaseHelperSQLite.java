package com.example.annexe5;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class DataBaseHelperSQLite extends SQLiteOpenHelper{

	public DataBaseHelperSQLite(Context context) {
		super(context, "db", null, 1);
	}

	@Override
	public void onCreate(SQLiteDatabase db) {
		db.execSQL("CREATE TABLE equipes(id INTEGER PRIMARY KEY AUTOINCREMENT," +
				"	nom TEXT," +
				"	division TEXT" +
				"	arena TEXT," +
				"	capacite INTEGER);");
	}

	@Override
	public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
		db.execSQL("DROP TABLE IF EXISTS equipes");
		onCreate(db);
	}
}
