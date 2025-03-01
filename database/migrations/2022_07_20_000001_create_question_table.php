<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Question;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->id('id_question');
            $table->string('question_text');
            $table->string('img_question')->nullable();
            $table->string('audio_question')->nullable();
            $table->string('id_time_question');
            $table->string('id_exam_type');
            $table->string('id_practice_test');
            $table->string('id_test_type');
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
        Schema::dropIfExists('question');
    }
};
