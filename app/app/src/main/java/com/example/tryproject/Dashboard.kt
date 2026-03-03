package com.example.tryproject

import android.annotation.SuppressLint
import android.os.Bundle
import android.content.Intent
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class Dashboard : AppCompatActivity() {
    @SuppressLint("MissingInflatedId")
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.dashboard)

        val cv_akun = findViewById<androidx.cardview.widget.CardView>(R.id.cv_akun)
        val cv_pengumuman = findViewById<androidx.cardview.widget.CardView>(R.id.cv_pengumuman)

        val cv_materi = findViewById<androidx.cardview.widget.CardView>(R.id.cv_materi)
        val cv_nilai = findViewById<androidx.cardview.widget.CardView>(R.id.cv_nilai)

        val cv_presensi = findViewById<androidx.cardview.widget.CardView>(R.id.cv_presensi)
        val cv_logout = findViewById<androidx.cardview.widget.CardView>(R.id.cv_logout)

        cv_akun.setOnClickListener {
            val pindah: Intent = Intent(this, Akun::class.java)
            startActivity(pindah)
        }
        cv_pengumuman.setOnClickListener {
            val geser: Intent = Intent(this, Pengumuman::class.java)
            startActivity(geser)
        }

        cv_materi.setOnClickListener {
            val pindah: Intent = Intent(this, Materi::class.java)
            startActivity(pindah)
        }
        cv_nilai.setOnClickListener {
            val geser: Intent = Intent(this, Nilai::class.java)
            startActivity(geser)
        }

        cv_presensi.setOnClickListener {
            val geser: Intent = Intent(this, Presensi::class.java)
            startActivity(geser)
        }
        cv_logout.setOnClickListener {
            val pindah: Intent = Intent(this, Login::class.java)
            startActivity(pindah)
        }
    }
}