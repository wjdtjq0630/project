package com.java.android.stopwatch;

import android.os.SystemClock;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Chronometer;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    private Chronometer mChronometer;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        mChronometer = (Chronometer) findViewById(R.id.chronometer_view);

        Button startBtn = (Button) findViewById(R.id.start_button);
        Button stopBtn = (Button) findViewById(R.id.stop_button);
        Button resetBtn = (Button) findViewById(R.id.reset_button);

        startBtn.setOnClickListener(this);
        stopBtn.setOnClickListener(this);
        resetBtn.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.start_button:
                mChronometer.start();
                break;
            case R.id.stop_button:
                mChronometer.stop();
                break;
            case R.id.reset_button:
                mChronometer.stop();
                mChronometer.setBase(SystemClock.elapsedRealtime());
                break;
        }
    }
}
