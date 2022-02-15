<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreign('user_id')->on('users')->references('id');
            $table->string('title');
            $table->longText('text');
            $table->string('summary');
            // $table->string('author');
            // $table->integer('authorID');
            $table->string('cover_url')->nullable();
            $table->integer('reading_time')->default(0);
            $table->boolean('can_comment')->default(false);
            $table->boolean('is_anonymous')->default(false);
            $table->boolean('can_like')->default(false);
            $table->boolean('is_featured')->default(false);
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
        Schema::dropIfExists('blogs');
    }
}
