<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->boolean('has_door1')->default(false);
            $table->enum('door1_state', ['Opened', 'Closed'])->nullable();
            $table->boolean('has_door2')->default(false);
            $table->enum('door2_state', ['Opened', 'Closed'])->nullable();
            $table->boolean('has_door_lock')->default(false);
            $table->enum('door_lock_state', ['Locked', 'Unlocked'])->nullable();
            $table->boolean('has_container_weight')->default(false);
            $table->double('container_weight_state', 11, 5)->nullable();
            $table->boolean('has_proximity')->default(false);
            $table->enum('proximity_state', ['Safe', 'Unsafe'])->nullable();
            $table->boolean('has_emergency_button')->default(false);
            $table->enum('emergency_button_state', ['Safe', 'Unsafe'])->nullable();
            $table->boolean('has_machine')->default(false);
            $table->enum('machine_state', ['On', 'Off'])->nullable();
            $table->boolean('has_driving_behavior')->default(false);
            $table->enum('driving_behavior_state', ['Stable', 'Unstable'])->nullable();
            $table->boolean('has_drowsiness')->default(false);
            $table->enum('drowsiness_state', ['Sleepy', 'Not Sleepy'])->nullable();
            $table->boolean('has_fuel_tank')->default(false);
            $table->enum('fuel_tank_state', ['Opened', 'Closed'])->nullable();
            $table->double('longitude', 10, 7)->nullable();
            $table->double('latitude', 10, 7)->nullable();
            $table->boolean('is_available')->default(true);
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
        Schema::dropIfExists('devices');
    }
}
