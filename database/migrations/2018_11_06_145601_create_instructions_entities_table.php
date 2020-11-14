<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructionsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructions_users', function (Blueprint $table) {
            $table->increments('instruction_entity_id');
            $table->unsignedInteger('instruction_id');
            $table->bigInteger('user_id');
            $table->json('blocks_viewed')
                ->nullable();
            $table->boolean('is_viewed')->default(false);

            $table->foreign('instruction_id')
                ->references('instruction_id')
                ->on('instructions');
            $table->index(['instruction_id']);
            $table->index(['user_id']);
            $table->unique(['instruction_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instructions_users');
    }
}
