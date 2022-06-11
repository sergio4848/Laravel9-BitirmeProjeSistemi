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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('project_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('faculty_id')->nullable();
            $table->float('grade')->nullable();
            $table->string('note',100)->nullable();
            $table->string('IP',20);
            $table->string('status',30)->default('New');
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
        Schema::dropIfExists('evaluations');
    }
};
