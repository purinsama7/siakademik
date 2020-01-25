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
            $table->float('uh1')->nullable();
            $table->float('uh2')->nullable();
            $table->float('uh3')->nullable();
            $table->float('uh4')->nullable();
            $table->float('uh5')->nullable();
            $table->float('uh6')->nullable();
            $table->float('uh7')->nullable();
            $table->float('uh8')->nullable();
            $table->float('uh9')->nullable();
            $table->float('uh10')->nullable();
            $table->float('uh11')->nullable();
            $table->float('uts')->nullable();
            $table->float('uas')->nullable();
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
