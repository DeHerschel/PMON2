<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Problems extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->text('description')->nullable();
            $table->integer('target_id');
            $table->index('target_id');
            $table->foreign('target_id')->references('id')->on('targets')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problems');
    }
}
