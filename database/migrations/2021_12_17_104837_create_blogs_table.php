<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
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
            $table->string('title');
            $table->longText('text');
            $table->string('summary');
            $table->string('author');
            $table->integer('authorID');
            $table->string('cover');
            $table->integer('readingTime')->default(0);
            $table->boolean('comments')->nullable();
            $table->boolean('anonymous')->nullable();
            $table->boolean('likes')->nullable();
            $table->boolean('featured')->nullable();
            $table->timestamp('creationDate')->default(DB::raw('CURRENT_TIMESTAMP'));
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
