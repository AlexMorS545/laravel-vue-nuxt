<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipmentRequest;
use App\Libs\Mask;
use App\Models\Equipment;
use App\Models\EquipmentType;

class EquipmentController extends Controller
{
    public function index()
    {
        return EquipmentType::get();
    }

    public function show($id)
    {
        return EquipmentType::find($id);
    }

    public function store(StoreEquipmentRequest $request)
    {
         $equipment = Equipment::create([
            'equipment_type_id' => $request->equipment_type_id,
            'serial_number' => $request->serial_number,
            'note' => $request->note,
        ]);
         $equipment_name = EquipmentType::find($request->equipment_type_id)->name;
         $equipment_type = EquipmentType::create([
             'name' => $equipment_name,
             'mask' => Mask::createMask($equipment->serial_number)
         ]);
        return response()->json(['success' => 'Успешно добавлено!', 'equipment' => $equipment_type]);
    }
}
