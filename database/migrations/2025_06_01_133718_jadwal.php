<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ('jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sesi_id')->constrained('sesi')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('dosen_id')->constrained('dosen')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('prodi_id')->constrained('prodi')->onDelete('restrict')->onUpdate('restrict');
            $table->string('hari', 10);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('ruang', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal'); // menghapus tabel atau kolom
    }
};
