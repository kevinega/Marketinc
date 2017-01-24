<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBrands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->string('brand_name');
            $table->string('username');
            $table->string('address');
            $table->string('location')->nullable();
            $table->string('phone_one');
            $table->string('phone_two')-> nullable();
            $table->string('membership');
            $table->string('description') -> nullable();
            $table->string('logo') -> nullable();
            $table->string('cover') -> nullable();
            $table->string('open_hour') -> nullable();
            $table->boolean('confirmed')-> default(0);
            $table->string('confirmation_code')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('brands');
    }
}
