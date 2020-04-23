<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActivitiesReferer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitors', function ($table) {
            $table->string('referer_domain')->nullable()->after('referer');
        });

        Schema::table('activities', function ($table) {
            $table->text('referer')->nullable()->after('query');
            $table->string('referer_domain')->nullable()->after('query');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitors', function ($table) {
            $table->dropColumn('referer_domain');
        });

        Schema::table('activities', function ($table) {
            $table->dropColumn('referer_domain');
            $table->dropColumn('referer');
        });
    }
}
