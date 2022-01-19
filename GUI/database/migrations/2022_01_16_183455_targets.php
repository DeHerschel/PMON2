<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class Targets extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('targets', function (Blueprint $table) {
            $table->id();
            $table->string('IP', 15)->unique();
            $table->string('domain')->nullable();
            $table->string('MAC', 17)->nullable();
            $table->string('name')->nullable()->unique();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('targets');
    }
}
