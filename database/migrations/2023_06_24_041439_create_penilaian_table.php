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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('minimarket_id');
            $table->unsignedBigInteger('kriteria_id');
            $table->unsignedBigInteger('sub_kriteria_id');
            $table->float('nilai');
            $table->timestamps();
            $table->foreign('minimarket_id')->references('id')->on('minimarkets');
            $table->foreign('kriteria_id')->references('id')->on('kriteria');
            $table->foreign('sub_kriteria_id')->references('id')->on('sub_kriteria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
};
