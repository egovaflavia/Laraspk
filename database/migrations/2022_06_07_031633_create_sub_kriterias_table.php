<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sub_kriteria', function (Blueprint $table) {
            $table->id('sub_kriteria_id');
            $table->foreignId('kriteria_id');
            $table->string('sub_kriteria_nama');
            $table->float('sub_kriteria_nilai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_kriterias');
    }
}
