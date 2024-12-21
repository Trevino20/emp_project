<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id()->primary(); 
            $table->string('name',30); 
            $table->string('desig');
            $table->string('gender');
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('Classes')->onUpdate('cascade')
            ->onDelete('cascade');
            // $table->string('exam'); 
            $table->date('dob'); 
            $table->string('phone'); 
            $table->text('email')->nullable()->unique(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};