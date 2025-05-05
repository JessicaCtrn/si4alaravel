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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('npm', 11);
            $table->string('nama', 30);
            $table->enum('jk', ['L','P']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir', 30);
            $table->string('asal_sma', 30);
            $table->foreignId('prodi_id')->constrained('prodi')->onDelete('restrict')->onUpdate('restrict'); // restrict biar dk teapos
            $table->string('foto', 50) -> nullable();
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
        Schema::dropIfExists('mahasiswa');
    }
};
