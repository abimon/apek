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
            $table->string('e_title')->default('');
            $table->string('composer')->default('');
            $table->string('key')->default('');
            $table->string('stanza1');
            $table->string('stanza2')->default('');
            $table->string('stanza3')->default('');
            $table->string('stanza4')->default('');
            $table->string('stanza5')->default('');
            $table->string('stanza6')->default('');
            $table->string('chorus')->default('');
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
