<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('thesis_digest_id')->unsigned()->index();
            $table->foreign('thesis_digest_id')->references('id')->on('thesis_digests')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('publication_type_id')->unsigned()->index();
            $table->foreign('publication_type_id')->references('id')->on('publication_types')->onDelete('cascade');
            $table->string('language');
            $table->integer('year');
            $table->string('pages');
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
        Schema::dropIfExists('theses');
    }
}
