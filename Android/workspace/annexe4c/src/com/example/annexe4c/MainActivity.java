package com.example.annexe4c;

import android.net.Uri;
import android.os.Bundle;
import android.provider.ContactsContract;
import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class MainActivity extends Activity {

	Button web;
	Button tel;
	Button map;
	Button mail;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		web = (Button)findViewById(R.id.button1);
		tel = (Button)findViewById(R.id.button2);
		map = (Button)findViewById(R.id.button3);
		mail = (Button)findViewById(R.id.button4);
		
		Ecouteur ec = new Ecouteur();
		
		web.setOnClickListener(ec);
		tel.setOnClickListener(ec);
		map.setOnClickListener(ec);
		mail.setOnClickListener(ec);
	}
	
	private class Ecouteur implements OnClickListener {
		@Override
		public void onClick(View v) {
			if (v.getId() == R.id.button1) {
				startActivity(new Intent(android.content.Intent.ACTION_VIEW,Uri.parse("http://amazon.fr/")));
			}
			else if (v.getId() == R.id.button2) {
				startActivity(new Intent(android.content.Intent.ACTION_DIAL,Uri.parse("tel:+5148911409")));
			}
			else if (v.getId() == R.id.button3) {
				startActivity(new Intent(android.content.Intent.ACTION_VIEW,Uri.parse("geo:?q=montreal,+quebec,+canada")));
			}
			else {
				Intent i = new Intent(android.content.Intent.ACTION_PICK);
				i.setType(ContactsContract.Contacts.CONTENT_TYPE);
				startActivityForResult(i,1);
			}
		}
	}
	
	public void onActivityResult (int requestCode, int resultCode, Intent data){
		if (requestCode == 1){
			if (resultCode == RESULT_OK){
				Intent i = new Intent(android.content.Intent.ACTION_VIEW, Uri.parse(data.getData().toString()));
				startActivity(i);
			}
		}
	}
}
