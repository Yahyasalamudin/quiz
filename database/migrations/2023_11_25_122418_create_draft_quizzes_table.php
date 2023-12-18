<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draft_quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('code_quiz');
            $table->string('title');
            $table->text('description');
            $table->json('question');
            $table->json('answer_a');
            $table->json('answer_b');
            $table->json('answer_c');
            $table->json('answer_d')->nullable();
            $table->json('answer_e')->nullable();
            $table->json('correct_answer');
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
        Schema::dropIfExists('draft_quizzes');
    }
};
