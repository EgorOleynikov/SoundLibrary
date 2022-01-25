<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role')->default(0);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::statement('INSERT INTO users (id, role, name, email, password, created_at, updated_at) VALUES (1, 1, "admin_passw=qwerty123", "admin@bigdeal.co", "$2y$10$626ztCNTJWEteszOrHAu8.MFOV2VVlQUVoGBE4YohhfID2pOrCiJ6", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
        DB::statement('INSERT INTO users (id, role, name, email, password, created_at, updated_at) VALUES (2, 0, "user_passw=qwerty123", "user@user.co", "$2y$10$626ztCNTJWEteszOrHAu8.MFOV2VVlQUVoGBE4YohhfID2pOrCiJ6", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
        DB::statement('INSERT INTO users (id, role, name, email, password, created_at, updated_at) VALUES (3, 2, "banned_passw=qwerty123", "banned@user.co", "$2y$10$626ztCNTJWEteszOrHAu8.MFOV2VVlQUVoGBE4YohhfID2pOrCiJ6", "2022-01-11 18:07:57", "2022-01-11 18:07:57");');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
