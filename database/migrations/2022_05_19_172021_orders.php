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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->mediumText('message');
            $table->boolean('verified')->default(0);
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('fileId');
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('fileId')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
