<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ip')->nullable();
            $table->text('referer')->nullable();
            $table->text('source')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('language')->nullable();
            $table->string('country')->nullable();
            $table->string('continent')->nullable();
            $table->boolean('is_mobile')->nullable();
            $table->boolean('is_bot')->nullable();
            $table->timestamp('last_active')->nullable(); // nullable otherwise mysql will at now() on update
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
        Schema::dropIfExists('visitors');
    }
}
