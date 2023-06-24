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
        Schema::create('hasil_nilai', function (Blueprint $table) {
            $table->id();
            $table->float('nilai');
            $table->unsignedBigInteger('minimarket_id');
            $table->timestamps();
            $table->foreign('minimarket_id')->references('id')->on('minimarkets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_nilai');
    }
};
