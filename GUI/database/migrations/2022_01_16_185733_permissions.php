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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('target');
            $table->integer('roll');
            $table->timestamps();
            $table->index('target', 'roll');
            $table->foreign('target')->references('id')->on('targets');
            $table->foreign('roll')->references('id')->on('rolls');
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
