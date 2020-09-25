<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->text('name');
            $table->text('sender_phone')->nullable();
            $table->text('sender_facebook')->nullable();
            $table->text('thief');
            $table->text('thief_email')->nullable();
            $table->text('facebook')->nullable();
            $table->text('number')->nullable();
            $table->integer('status')->default('1');
            $table->text('screen')->nullable();
            
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
        Schema::dropIfExists('reportes');
    }
}
