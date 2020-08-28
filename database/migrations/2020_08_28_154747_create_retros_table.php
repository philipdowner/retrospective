<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('owner_id');
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->enum('status', ['draft', 'publish', 'archive']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retros');
    }
}
