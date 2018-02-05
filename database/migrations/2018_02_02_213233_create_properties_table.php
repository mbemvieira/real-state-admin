<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 100);
            $table->string('code', 20)->unique();
            $table->char('type', 1);

            $table->string('address_cep', 10)->nullable();
            $table->string('address_street', 50)->nullable();
            $table->string('address_number', 5)->nullable();
            $table->string('address_neighbour', 20)->nullable();
            $table->string('address_complements', 10)->nullable();
            $table->string('address_city', 30)->nullable();
            $table->string('address_state', 20)->nullable();

            $table->float('price', 11, 2)->nullable();
            $table->float('area', 11, 2)->nullable();
            $table->unsignedTinyInteger('number_bedrooms')->nullable();
            $table->unsignedTinyInteger('number_suite')->nullable();
            $table->unsignedTinyInteger('number_bathrooms')->nullable();
            $table->unsignedTinyInteger('number_rooms')->nullable();
            $table->unsignedTinyInteger('number_parking_places')->nullable();

            $table->string('description', 300)->nullable();
            $table->string('image', 100)->nullable();

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
        Schema::dropIfExists('properties');
    }
}
