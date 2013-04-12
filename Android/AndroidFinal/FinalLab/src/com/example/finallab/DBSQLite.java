package com.example.finallab;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class DBSQLite extends SQLiteOpenHelper{

	public DBSQLite(Context context) {
		super(context, "db", null, 1);
	}

	@Override
	public void onCreate(SQLiteDatabase db) {
		db.execSQL("CREATE TABLE hotels(id INTEGER PRIMARY KEY AUTOINCREMENT," +
										"nom TEXT," +
										"adresse TEXT," +
										"tel TEXT" +
										"description TEXT," +
										"prix INTEGER)");
		
		db.execSQL("CREATE TABLE restos(id INTEGER PRIMARY KEY AUTOINCREMENT," +
										"nom TEXT," +
										"adresse TEXT," +
										"tel TEXT" +
										"description TEXT," +
										"prix INTEGER)");
	}

	@Override
	public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
		db.execSQL("DROP TABLE IF EXIST hotels");
		db.execSQL("DROP TABLE IF EXIST restos");
		onCreate(db);
	}

}
