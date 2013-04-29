package com.example.world;

import android.os.Bundle;
import android.app.Activity;
import android.graphics.Color;
import android.util.Log;
import android.view.Menu;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

public class Hello extends Activity {
	
	EditText champ;
	TextView quebec,yukon;
	
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_hello);
        Log.i("Erwan", "Passé dans le onCreate");
        
        champ = (EditText)findViewById(R.id.editText1);
        quebec = (TextView)findViewById(R.id.textView2);
        yukon = (TextView)findViewById(R.id.textView3);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.hello, menu);
        return true;
    }
    
    public void gestion(View button){
    	Log.i("fff","gestion");
    	
    	if ((champ.getText().toString().matches("[A-Z]{3} \\d{3}")) || (champ.getText().toString().matches("\\d{3} [A-Z]{3}"))){
    		quebec.setBackgroundColor(Color.GREEN);
    	}
    	else {
    		quebec.setBackgroundColor(Color.RED);
    	}
    	
    	if (champ.getText().toString().matches("[A-Z]{3}\\d{2}")){
    		yukon.setBackgroundColor(Color.GREEN);
    	}
    	else {
    		yukon.setBackgroundColor(Color.RED);
    	}
    }
}
