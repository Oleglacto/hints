<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructionBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instruction_blocks', function (Blueprint $table) {
            $table->increments('instruction_block_id');
            $table->unsignedInteger('instruction_id');
            $table->json('data');
            $table->foreign('instruction_id')
                ->references('instruction_id')
                ->on('instructions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instruction_blocks');
    }
}
