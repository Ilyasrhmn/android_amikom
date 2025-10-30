package com.example.tryproject

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.BaseAdapter
import android.widget.TextView

class Materi_item (val halaman:Materi, val juduls:MutableList<String>, val namas:MutableList<String>) : BaseAdapter() {
    override fun getCount(): Int {
        return juduls.size
    }

    override fun getItem(posisi: Int): Any? {
        return juduls.get(posisi)
    }

    override fun getItemId(posisi: Int): Long {
        return posisi.toLong()
    }

    override fun getView(
        posisi: Int,
        convertview: View?,
        parent: ViewGroup?
    ): View? {
        val view = LayoutInflater.from(halaman).inflate(R.layout.materi_item, parent, false)
        val tv_judul : TextView = view.findViewById(R.id.tv_judul)
        tv_judul.text = juduls.get(posisi)

        val tv_nama : TextView = view.findViewById(R.id.tv_nama)
        tv_nama.text = namas.get(posisi)

        return view
    }
}