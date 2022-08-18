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
        Schema::create('reservations_info', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\ReservationModel::class,'reservation_id');
            $table->string('seat_class', '16');
            $table->string('name');
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('title', ['Mr', 'Mrs', 'Miss']);
            $table->date('date_of_birth');
            $table->bigInteger('phone_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations_info');
    }
};
