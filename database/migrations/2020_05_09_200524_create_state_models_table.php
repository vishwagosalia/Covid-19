<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_data', function (Blueprint $table) {
            $table->id();
            $table->string('state');
            $table->bigInteger('active');
            $table->bigInteger('confirmed');
            $table->bigInteger('deaths');
            $table->bigInteger('recovered');
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
        Schema::dropIfExists('state_data');
    }
}
