<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('location')->nullable();
            $table->foreignIdFor(\App\Models\Post::class)->nullable();
            $table->foreignIdFor(\App\Models\Team::class, 'teamA_id')->nullable();
            $table->foreignIdFor(\App\Models\Team::class, 'teamB_id')->nullable();
            $table->foreignIdFor(\App\Models\User::class, 'teamA_players_id')->nullable();
            $table->foreignIdFor(\App\Models\User::class, 'teamB_players_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenges');
    }
}
