<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAltImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('news', function (Blueprint $table) {
            $table->string('alt')->after('image')->nullable();
            $table->text('meta_keywords')->after('body')->nullable();
        });
        Schema::table('mitras', function (Blueprint $table) {
            $table->string('alt')->after('image')->nullable();
            $table->text('meta_keywords')->after('alt')->nullable();
        });
        Schema::table('produks', function (Blueprint $table) {
            $table->string('alt')->after('image')->nullable();
            $table->text('meta_keywords')->after('body')->nullable();
        });
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('alt')->after('image')->nullable();
            $table->text('meta_keywords')->after('body')->nullable();
        });
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('alt')->after('image')->nullable();
            $table->text('meta_keywords')->after('description')->nullable();
        });
        Schema::table('galeris', function (Blueprint $table) {
            $table->text('meta_keywords')->after('description')->nullable();
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
