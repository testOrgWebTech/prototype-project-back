<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path')->nullable(true)->default('off.jpg');
            $table->foreignIdFor(\App\Models\User::class)->nullable(true);
            $table->foreignIdFor(\App\Models\Post::class)->nullable(true);
            $table->foreignIdFor(\App\Models\Comment::class)->nullable(true);
            $table->foreignIdFor(\App\Models\Message::class)->nullable(true);
            $table->timestamps();
            $table->softDeletes();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
