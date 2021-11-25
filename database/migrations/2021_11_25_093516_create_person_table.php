<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('suffix');
            $table->string('lastname');
            // name
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('postalZip');
            $table->string('region');
            $table->string('country');
            $table->string('list');
            $table->string('text');
            $table->string('numberrange');
            $table->string('currency');
            $table->string('alphanumeric');
            // $table->string('email')->unique();
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
        Schema::dropIfExists('person');
    }
}
