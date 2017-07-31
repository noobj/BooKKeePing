<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class AddFuckedTimeFieldToDummy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dummies', function (Blueprint $table) {
            $table->timestamp('fucked_time')->default(Carbon::createFromTimestamp(0));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dummies', function (Blueprint $table) {
            $table->dropColumn('fucked_time');
        });
    }
}
