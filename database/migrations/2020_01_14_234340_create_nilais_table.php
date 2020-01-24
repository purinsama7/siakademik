<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uh1');
            $table->string('uh2');
            $table->string('uh3');
            $table->string('uh4');
            $table->string('uh5');
            $table->string('uh6');
            $table->string('uh7');
            $table->string('uh8');
            $table->string('uh9');
            $table->string('uh10');
            $table->string('uh11');
            $table->string('uts');
            $table->string('uas');
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
        Schema::dropIfExists('nilai');
    }
}
