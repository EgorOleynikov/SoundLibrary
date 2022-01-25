<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->timestamps();
        });

        DB::statement('INSERT INTO categories (id, category, created_at, updated_at) VALUES (1, "alt-j", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
        DB::statement('INSERT INTO categories (id, category, created_at, updated_at) VALUES (2, "Shakey Graves", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
        DB::statement('INSERT INTO categories (id, category, created_at, updated_at) VALUES (3, "Hoizer", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
        DB::statement('INSERT INTO categories (id, category, created_at, updated_at) VALUES (4, "French 79", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
        DB::statement('INSERT INTO categories (id, category, created_at, updated_at) VALUES (5, "Winter aid", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
        DB::statement('INSERT INTO categories (id, category, created_at, updated_at) VALUES (6, "Trevor Hall", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
        DB::statement('INSERT INTO categories (id, category, created_at, updated_at) VALUES (7, "The acid", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
        DB::statement('INSERT INTO categories (id, category, created_at, updated_at) VALUES (8, "The Neighbourhood", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
        DB::statement('INSERT INTO categories (id, category, created_at, updated_at) VALUES (9, "The Maccabees", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
        DB::statement('INSERT INTO categories (id, category, created_at, updated_at) VALUES (10, "Meme", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
