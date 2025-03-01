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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id('id_evaluation');
            $table->integer('id_et_creation_user');
            $table->integer('id_candidate')->nullable();
            $table->string('candidate_name')->nullable();
            $table->string('candidate_email')->nullable();
            $table->integer('country_code')->nullable();
            //$table->string('country_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('notes')->nullable();
            $table->string('url_link')->nullable();
            $table->string('answer_status')->nullable();
            $table->string('et_status')->nullable();
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
        Schema::dropIfExists('evaluations');
    }
};
