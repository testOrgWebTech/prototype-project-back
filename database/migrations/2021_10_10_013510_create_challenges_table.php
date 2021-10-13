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
            $table->string('victory_team')->nullable();
            $table->enum('match_progress', ['WAITING', 'ENDED']);
            //not sure about mode...
            // $table->enum('mode', ['1V1', '5v5']); ? TEAM VS TEAM, SOLO VS SOLO?
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
