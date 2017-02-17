<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->unsigned();
            $table->boolean('breakfast')-> default(0);
            $table->boolean('parking_lot')-> default(0);
            $table->boolean('wifi')-> default(0);
            $table->boolean('smoking_area')-> default(0);
            $table->boolean('ac')-> default(0);
            $table->boolean('working_environment')-> default(0);
            $table->boolean('reservation')-> default(0);
            $table->boolean('private_room')-> default(0);
            $table->boolean('alcohol')-> default(0);
            $table->boolean('valet')-> default(0);
            $table->boolean('delivery_services')-> default(0);
            $table->timestamps();
        });

        Schema::table('facilities',function(Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facilities');
    }
}
