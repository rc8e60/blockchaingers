<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStellarToCorporationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('corporations', function (Blueprint $table) {
            $table->string('account_address')->nullable();
            $table->string('account_secret')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('corporations', function (Blueprint $table) {
            $table->dropColumn([
                'account_address',
                'account_secret',
            ]);
        });
    }
}
