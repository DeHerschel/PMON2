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
        Schema::create('role_target', function (Blueprint $table) {
            $table->id();
            $table->integer('target_id');
            $table->integer('role_id');
            $table->timestamps();
            $table->index('target_id', 'role_id');
            $table->foreign('target_id')->references('id')->on('targets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('role_id')->references('id')->on('roles')->cascadeOnDelete()->cascadeOnUpdate();
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
