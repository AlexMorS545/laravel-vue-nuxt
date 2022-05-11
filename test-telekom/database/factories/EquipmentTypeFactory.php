<?php

namespace Database\Factories;

use App\Libs\Mask;
use App\Models\Equipment;
use App\Models\EquipmentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EquipmentType>
 */
class EquipmentTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['TP-Link TL-WR74', 'D-Link DIR-300', 'D-Link DIR-300 S']),
            'mask' => null
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (EquipmentType $equipmentType) {
            $this->createEquipment($equipmentType);
        });
    }

    private function createEquipment($equipmentType)
    {
        $equipment = Equipment::create([
            'equipment_type_id' => $equipmentType->id,
            'serial_number' => $this->faker->unique()->regexify('[a-zA-Z0-9-_@]{10}'),
            'note' => null
        ]);
        $equipment->equipmentType->update([
            'mask' => $this->createMask($equipment->serial_number)
        ]);
    }

    private function createMask(string $text)
    {
        return Mask::createMask($text);
    }
}
