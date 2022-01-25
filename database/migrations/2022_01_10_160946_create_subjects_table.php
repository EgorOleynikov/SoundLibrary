<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('subject');
            $table->timestamps();
        });
        
        DB::statement('INSERT INTO subjects (id, subject, created_at, updated_at) VALUES (1, "The sound is too good", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
        DB::statement('INSERT INTO subjects (id, subject, created_at, updated_at) VALUES (2, "The sound does not respect my gender identity", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
        DB::statement('INSERT INTO subjects (id, subject, created_at, updated_at) VALUES (3, "This sound appeared in the First World War against the Entente", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
