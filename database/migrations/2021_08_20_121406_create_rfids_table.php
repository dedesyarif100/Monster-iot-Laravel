<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfids', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('brand')->nullable();
            $table->string('type')->nullable();
            $table->string('sn')->nullable();
            $table->dateTime('buy_at')->nullable();
            $table->double('kilometer_start', 20, 2)->nullable();
            $table->double('kilometer_end', 20, 2)->nullable();
            $table->boolean('is_broken')->default(false);
            $table->unsignedBigInteger('created_by')->index();
            $table->unsignedBigInteger('updated_by')->index();
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
        Schema::dropIfExists('rfids');
    }
}
