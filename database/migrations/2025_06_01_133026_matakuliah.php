<?php

use Illuminate\Database\Eloquent\Scope;
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
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('kode', 10);
            $table->integer('sks');
            $table->foreignId('prodi_id')->constrained('prodi')->onDelete('restrict')->onUpdate('restrict'); // restrict biar dk teapos
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
        Schema::dropIfExists('matakuliah'); // menghapus tabel atau kolom
    }
};
