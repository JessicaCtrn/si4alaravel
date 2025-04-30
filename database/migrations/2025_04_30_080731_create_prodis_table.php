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
        Schema::create('prodi', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('singkatan', 2);
            $table->string('kaprodi', 30);
            $table->string('sekretaris', 30);
            $table->foreignId('fakultas_id')->constrained('fakultas')->onDelete('restrict')->onUpdate('restrict'); // restrict biar dk teapos
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
        Schema::dropIfExists('prodi');
    }
};
