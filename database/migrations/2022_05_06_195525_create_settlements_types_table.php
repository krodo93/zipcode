<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettlementsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();
            $table->string('d_codigo');
            $table->string('d_asenta');
            $table->string('d_tipo_asenta');
            $table->string('d_mnpio');
            $table->string('d_estado');
            $table->string('d_ciudad')->nullable();
            $table->string('d_cp')->nullable();
            $table->string('c_estado');
            $table->string('c_oficina')->nullable();
            $table->string('c_mnpio');
            $table->string('c_tipo_asenta');
            $table->string('id_asenta_cpcons');
            $table->string('d_zona');
            $table->string('d_cve_ciudad')->nullable();
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
        Schema::dropIfExists('settlements_types');
    }
}
