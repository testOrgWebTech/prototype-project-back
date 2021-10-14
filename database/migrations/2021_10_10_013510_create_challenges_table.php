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
            $table->foreignIdFor(\App\Models\Post::class);
            $table->foreignIdFor(\App\Models\Team::class, 'teamA_id');
            $table->foreignIdFor(\App\Models\Team::class, 'teamB_id')->nullable();
            $table->enum('victory_team', ['A', 'B'])->nullable();
            $table->enum('match_progress', ['WAITING', 'ENDED'])->default('WAITING');
            $table->enum('mode', ['1V1', '2v2', '3v3', '4v4', '5v5', '6v6', '7v7']);
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
