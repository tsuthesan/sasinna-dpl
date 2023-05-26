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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name')->index()->nullable();
            $table->string('description')->nullable();
            $table->double('avg_cost')->default(0);
            $table->tinyInteger('group')->default(0);
            $table->tinyInteger('unit')->default(0);
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('free')->default(0);
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('items');
    }
};
