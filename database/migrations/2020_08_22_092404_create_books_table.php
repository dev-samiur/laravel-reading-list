<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('googleBooksId')->nullable();
            $table->string('kind')->nullable();
            $table->string('publishedDate')->nullable();
            $table->string('isbn10Identifier')->nullable();
            $table->string('isbn13Identifier')->nullable();
            $table->string('publisher')->nullable();
            $table->string('infoLink')->nullable();
            $table->string('title')->nullable();
            $table->string('author')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('pageCount')->nullable();
            $table->string('thumbnailSmall')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('coverSmall')->nullable();
            $table->string('coverMedium')->nullable();
            $table->string('coverLarge')->nullable();
            $table->string('coverExtralarge')->nullable();
            $table->string('slug')->nullable();
            $table->string('publishedYear');
            $table->string('category');
            $table->string('amazonLink')->nullable();
            $table->string('tier')->nullable();
            $table->string('public')->nullable();
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
        Schema::dropIfExists('books');
    }
}
