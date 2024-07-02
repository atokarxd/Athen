<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('costumer_id');
            $table->foreign('costumer_id')->references('id')->on('costumers');
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->foreign('worker_id')->references('id')->on('workers');
            $table->text('description');
            $table->enum('type', ['fault', 'investment', 'other']);
            $table->enum('status', ['inprogress', 'done', 'failed']);
            $table->text('coordinate')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
