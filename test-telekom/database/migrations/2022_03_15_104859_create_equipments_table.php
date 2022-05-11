<?php

use App\Models\Equipment;
use App\Models\EquipmentType;
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
        Schema::create(Equipment::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipment_type_id');
            $table->string('serial_number')->unique();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('equipment_type_id')->references('id')->on(EquipmentType::TABLE)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Equipment::TABLE);
    }
};
