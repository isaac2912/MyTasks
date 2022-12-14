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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("category")->nullable();
            $table->string("task_doc")->nullable();
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->string("budget")->nullable();
            $table->string("priority")->nullable();
            $table->text("description")->nullable();
            $table->text("status")->nullable();
            $table->string("points")->nullable();
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
        Schema::dropIfExists('tasks');
    }
};
