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
        Schema::create('add_events', function (Blueprint $table) {
            $table->id();
             $table->string('event_name')->nullable();
             $table->string('description')->nullable();
             $table->string('image')->nullable();
             $table->string('quantity')->nullable();
             $table->string('price')->nullable();
             $table->boolean('status')->default(1);
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
        Schema::dropIfExists('add_events');
        
    }
};
