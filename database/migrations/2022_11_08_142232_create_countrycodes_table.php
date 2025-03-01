<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Countrycode;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countrycode', function (Blueprint $table) {
            $table->id('id_countrycode');
            $table->string('country_name');
            $table->string('data_countrycode');
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
        Schema::dropIfExists('countrycode');
    }
};
  /*  [
                'country_name' => '',
                'data_countrycode' => '',
             ], */