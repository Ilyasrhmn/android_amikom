package com.example.tryproject

import android.os.Bundle
import android.widget.GridView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import org.json.JSONObject

class Materi : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.materi)

        val gv_materi:GridView = findViewById(R.id.gv_materi)
        var juduls: MutableList<String> = mutableListOf()
        var namas: MutableList<String> = mutableListOf()
        val minta = Volley.newRequestQueue(this)
        val mintadata = object : StringRequest(
            Request.Method.POST,
            "http://192.168.1.3/android_amikom/materi_tampil.php",
            Response.Listener{
                    response ->
                val dataarray = JSONObject(response).getJSONArray("data")
                for (i in 0 until dataarray.length()) {
                    val jdl = dataarray.getJSONObject(i).getString("judul_materi")
                    val nm = dataarray.getJSONObject(i).getString("nama_dosen")
                    juduls.add(jdl)
                    namas.add(nm)
                }
                val perulangandata = Materi_item(this, juduls, namas)
                gv_materi.adapter = perulangandata
            },
            Response.ErrorListener{
                    error ->
            }
        ) {
            override  fun getParams(): MutableMap<String, String> {
                val bawaan: MutableMap<String, String> = HashMap()
                bawaan.put("kode", "ilyas3203")
                return bawaan
            }
        }
        minta.add(mintadata)
    }
}