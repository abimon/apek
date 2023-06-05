<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNZKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n_z_k_s', function (Blueprint $table) {
            $table->id();
            $table->string('s_title');
            $table->string('e_title');
            $table->string('composer');
            $table->string('key');
            $table->string('stanza1');
            $table->string('stanza2');
            $table->string('stanza3');
            $table->string('stanza4');
            $table->string('stanza5');
            $table->string('stanza6');
            $table->string('chorus');
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
        Schema::dropIfExists('n_z_k_s');
    }
}