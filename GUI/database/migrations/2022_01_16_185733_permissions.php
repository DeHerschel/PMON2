<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Permissions extends Migration {
    /**
     * Run the migrations.
     * @return void
     */
    public function up() {
        Schema::create('roll_target', function (Blueprint $table) {
            $table->id();
            $table->integer('target_id');
            $table->integer('roll_id');
            $table->timestamps();
            $table->index('target_id', 'roll_id');
            $table->foreign('target_id')->references('id')->on('targets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('roll_id')->references('id')->on('rolls')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('permissions');
    }
}
