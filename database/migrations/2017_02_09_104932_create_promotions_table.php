<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_id')->unsigned();
            $table->string('title');
            $table->string('image');
            $table->string('description');
            $table->string('promotion_type');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('valid_mon')-> default(0);
            $table->boolean('valid_tue')-> default(0);
            $table->boolean('valid_wed')-> default(0);
            $table->boolean('valid_thu')-> default(0);
            $table->boolean('valid_fri')-> default(0);
            $table->boolean('valid_sat')-> default(0);
            $table->boolean('valid_sun')-> default(0);
            $table->timestamps('created_at');
        });

        Schema::table('promotions',function(Blueprint $table) {
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
        Schema::dropIfExists('promotions');
    }
}
