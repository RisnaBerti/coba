<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perencanaans', function (Blueprint $table) {
            $table->id();
            $table->enum('sub_kegiatan', ['Pembangunan Puskesmas', 'Rehabilitasi dan Pemeliharaan Puskesmas', 'Pengembangan Puskesmas', 'Pengembangan Fasilitas Kesehatan Lainnya', 'Pengadaan Alat Kesehatan/Alat Penunjang Medik Fasyankes', 'Pemeliharaan Rutin Berkala Alat Kesehatan/Alat Penunjang Medik Fasyankes', 'Rehabilitasi dan Pemeliharaan Fasilitas Kesehatan Lainnya']);
			$table->enum('jenis_pengadaan', ['Tender', 'Non-Tender', 'E-Katalog', 'Penunjukan Langsung']);
			$table->enum('jenis_pekerjaan', ['Konstruksi', 'Non-Konstruksi']);
			$table->enum('sumber_dana', ['APBD', 'DAK', 'BANKEU']);
			$table->string('nama_pekerjaan', 50);
			$table->integer('jumlah');
			$table->string('satuan', 25);
			$table->bigInteger('harga_satuan');
			$table->bigInteger('pagu_anggaran');
			$table->enum('lokasi', ['Daftar UPTD di Lingkup Dinas Kesehatan', 'Labkesda', 'Farmasi', 'Puskesmas', 'PSC']);
			$table->date('rencana_lelang');
			$table->date('rencana_kontrak');
			$table->date('rencana_pengadaan');
			$table->string('dokumen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perencanaans');
    }
};
