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
            $table->string('name'); //ninkname in app
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',['PLAYER','REFEREE','ADMIN'])
                ->default('PLAYER');
            $table->enum("status",['ACTIVE','INACTIVE'])->default("ACTIVE");
            $table->string('detail')->nullable();
            $table->rememberToken();
            $table->timestamps();

            /*$table->string('first_name');
            $table->string('last_name');
            $table->dateTime('birthdate');
            $table->string('country');*/
        });
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
