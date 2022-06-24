<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeritungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_peritungan', function (Blueprint $table) {
            $table->id('perhitungan_id');
            $table->foreignId('supplier_id');
            $table->float('perhitungan_c1');
            $table->float('perhitungan_c2');
            $table->float('perhitungan_c3');
            $table->float('perhitungan_c4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_peritungan');
    }
}
