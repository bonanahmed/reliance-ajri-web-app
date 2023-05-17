<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnForSeo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->text('meta_description')->after('meta_keywords')->nullable();
            $table->text('meta_title')->after('meta_description')->nullable();
        });
        Schema::table('produks', function (Blueprint $table) {
            $table->text('meta_description')->after('meta_keywords')->nullable();
            $table->text('meta_title')->after('meta_description')->nullable();
        });
        Schema::table('abouts', function (Blueprint $table) {
            $table->text('meta_description')->after('meta_keywords')->nullable();
            $table->text('meta_title')->after('meta_description')->nullable();
        });
        Schema::table('sliders', function (Blueprint $table) {
            $table->text('meta_description')->after('meta_keywords')->nullable();
            $table->text('meta_title')->after('meta_description')->nullable();
        });
        Schema::table('galeris', function (Blueprint $table) {
            $table->text('meta_description')->after('meta_keywords')->nullable();
            $table->text('meta_title')->after('meta_description')->nullable();
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
