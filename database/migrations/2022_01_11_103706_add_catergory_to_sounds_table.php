<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatergoryToSoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sounds', function (Blueprint $table) {
            $table->foreignId('category')->references('id')->on('categories')->onDelete('cascade');
        });

        DB::statement('INSERT INTO sounds (id, category, name, tags, sound_path, cover_path, user_id, published) VALUES (1, 5, "The Wisp Sings", "cozy music song", "The Wisp Sings.mp3", "The Wisp Sings.jpg", 1, 1);');
        DB::statement('INSERT INTO sounds (id, category, name, tags, sound_path, cover_path, user_id, published) VALUES (2, 2, "Tomorrow", "graves music song", "Tomorrow.mp3", "Tomorrow.jpg", 1, 1);');
        DB::statement('INSERT INTO sounds (id, category, name, tags, sound_path, cover_path, user_id, published) VALUES (3, 8, "W.D.Y.W.F.M", "wdywfm music song", "W.D.Y.W.F.M.mp3", "W.D.Y.W.F.M.jpg", 1, 1);');
        DB::statement('INSERT INTO sounds (id, category, name, tags, sound_path, cover_path, user_id, published) VALUES (4, 3, "Wasteland, Baby!", "music song", "Wasteland, Baby!.flac", "Wasteland, Baby!.jpg", 1, 1);');
        DB::statement('INSERT INTO sounds (id, category, name, tags, sound_path, cover_path, user_id, published) VALUES (5, 6, "The Weaver", "weaver trevor hall", "The Weaver.mp3", "The Weaver.jpg", 1, 1);');
        DB::statement('INSERT INTO sounds (id, category, name, tags, sound_path, cover_path, user_id, published) VALUES (6, 1, "3WW", "alt-j music song", "3WW.flac", "3WW.jpg", 1, 1);');
        DB::statement('INSERT INTO sounds (id, category, name, tags, sound_path, cover_path, user_id, published) VALUES (7, 10, "Ching Cheng Hanji!", "Tom Chin Cheng Hanji", "Ching Cheng Hanji!.mp3", "Ching Cheng Hanji!.gif", 1, 1);');
        DB::statement('INSERT INTO sounds (id, category, name, tags, sound_path, cover_path, user_id, published) VALUES (8, 3, "Cherry Wine (Live)", "wine music song", "Cherry Wine (Live).flac", "Cherry Wine (Live).jpg", 1, 1);');
        DB::statement('INSERT INTO sounds (id, category, name, tags, sound_path, cover_path, user_id, published) VALUES (9, 7, "Basic Instinct", "alt-j music song", "Basic Instinct.mp3", "Basic Instinct.jpg", 1, 1);');
        DB::statement('INSERT INTO sounds (id, category, name, tags, sound_path, cover_path, user_id, published) VALUES (10, 4, "Hometown", "french hometown song", "Hometown.mp3", "Hometown.jpg", 1, 1);');
        DB::statement('INSERT INTO sounds (id, category, name, tags, sound_path, cover_path, user_id, published) VALUES (11, 9, "Lego", "lego music song", "Lego.mp3", "Lego.jpg", 1, 1);');
        DB::statement('INSERT INTO sounds (id, category, name, tags, sound_path, cover_path, user_id, published) VALUES (12, 2, "Roll the Bones", "bones graves song", "Roll the Bones.mp3", "Roll the Bones.jpg", 1, 1);');
        DB::statement('INSERT INTO sounds (id, category, name, tags, sound_path, cover_path, user_id, published) VALUES (13, 10, "Polish Cow", "meme song polish cow song", "Polish Cow.mp3", "Polish Cow.gif", 1, 1);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sounds', function (Blueprint $table) {
            $table->dropForeign('sounds_category_foreign');
            $table->dropColumn('category');
        });
    }
}
