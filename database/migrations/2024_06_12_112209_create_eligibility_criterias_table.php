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
        Schema::create('eligibility_criterias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('age_less_than')->nullable();
            $table->tinyInteger('age_greater_than')->nullable();
            $table->integer('last_login_days_ago')->nullable();
            $table->integer('income_less_than')->nullable();
            $table->integer('income_greater_than')->nullable();
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
        Schema::dropIfExists('eligibility_criterias');
    }
};
