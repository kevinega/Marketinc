<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('email');
            $table->dropColumn('address');
            $table->dropColumn('name');
            $table->dropPrimary('transactions_id_primary');
            $table->dropColumn('transactions_id_primary');
            $table->renameColumn('transaction_id','id');
        });
        Schema::table('transactions', function (Blueprint $table) {
            
            $table->string('id')->unique()->change();
            $table->primary('id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
