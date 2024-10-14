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
        Schema::create('data', function (Blueprint $table) {
            $table->id();

            $table->string('cni_ci', 50);
            $table->string('estado_ident', 25);

            $table->unsignedBigInteger('foto_id')->nullable();
            $table->foreign('foto_id')->references('id')->on('fotos')->onDelete('cascade');

            $table->string('nombre', 100);
            $table->string('clave_elec', 25);
            $table->date('fecha_ingreso');
            $table->text('tatuajes', 750);
            $table->text('señas', 750);
            $table->text('vestimenta', 750);
            $table->date('fecha_nac');
            $table->unsignedBigInteger('edad')->unsigned()->length(3);
            $table->string('d_calle', 50);
            $table->string('d_num', 15);
            $table->string('d_col', 50);
            $table->unsignedBigInteger('d_cp')->unsigned()->length(5);
            $table->string('d_est', 50);
            $table->string('d_muni', 50);
            $table->string('d_localidad', 50);
            $table->string('cedid', 50);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
