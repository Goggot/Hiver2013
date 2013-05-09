package com.example.finallab;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class DBSQLite extends SQLiteOpenHelper{

	public DBSQLite(Context context) {
		super(context, "abeassfc", null, 1);
	}

	@Override
	public void onCreate(SQLiteDatabase db) {
		db.execSQL("CREATE TABLE hotels(_id INTEGER PRIMARY KEY AUTOINCREMENT," +
					"nom TEXT," +
					"adresse TEXT," +
					"tel TEXT," +
					"description TEXT," +
					"prix TEXT);");
		
		db.execSQL("CREATE TABLE restos(_id INTEGER PRIMARY KEY AUTOINCREMENT," +
					"nom TEXT," +
					"adresse TEXT," +
					"tel TEXT," +
					"description TEXT," +
					"prix TEXT);");
	}

	@Override
	public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
		db.execSQL("DROP TABLE IF EXIST hotels");
		db.execSQL("DROP TABLE IF EXIST restos");
		onCreate(db);
	}
}