package com.example.tryproject

import android.os.Bundle
import android.util.Log
import android.widget.ListView
import androidx.appcompat.app.AppCompatActivity
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import com.example.tryproject.Pengumuman_item
import org.json.JSONObject

class Pengumuman : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.pengumuman)

        val juduls:MutableList<String> = mutableListOf()
        val tanggals:MutableList<String> = mutableListOf()

        val lv_pengumuman: ListView = findViewById(R.id.lv_pengumuman)
        val minta = Volley.newRequestQueue(this)
        val mintadata: StringRequest = object : StringRequest(
            Request.Method.POST,
            "http://192.168.1.3/android_amikom/pengumuman_tampil.php",
            Response.Listener<String>{ response ->
                val dataarray = JSONObject(response).getJSONArray("data")
                for (i in 0 until dataarray.length()) {
                    val jdl = dataarray.getJSONObject(i).getString("judul_pengumuman")
                    val tgl = dataarray.getJSONObject(i).getString("tanggal_pengumuman")
                    juduls.add(jdl)
                    tanggals.add(tgl)
                }
                var perulangandata = Pengumuman_item(this, juduls, tanggals)
                lv_pengumuman.adapter = perulangandata
            },
            Response.ErrorListener {
                Log.d("eekror", "bermasalah")
            }
        ){
            override fun getParams(): MutableMap<String, String> {
                val bawaan:MutableMap<String, String> = HashMap()
                bawaan.put("kode", "ilyas3203")

                return bawaan
            }
        }
        minta.add(mintadata)
    }
}