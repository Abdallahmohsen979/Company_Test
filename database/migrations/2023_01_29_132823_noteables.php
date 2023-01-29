<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('noteables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('note_id')->constrained('notes');
            $table->integer('noteable_id');
            $table->string('noteable_type');
            $table->timestamps();
        });
    }


    public function down()
    {
        //
    }
};
