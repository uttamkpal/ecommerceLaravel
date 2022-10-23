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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('sitename')->default('UttamSping');
            $table->string('phone')->default('01740790058');
            $table->string('address')->default('Pabna University of Science and Technology');
            $table->string('email')->default('uttampal.kumar@gmail.com');
            $table->string('facebook')->default('UttamSping');
            $table->string('twitter')->default('UttamSping');
            $table->string('instagram')->default('UttamSping');
            $table->string('pinterest')->default('UttamSping');
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
        Schema::dropIfExists('sites');
    }
};
