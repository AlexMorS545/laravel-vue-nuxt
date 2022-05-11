<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentType extends Model
{
    use HasFactory, SoftDeletes;

    const TABLE = 'equipment_types';

    protected $fillable = [
        'name',
        'mask',
    ];

    public function equipment(): HasMany
    {
        return $this->hasMany(Equipment::class);
    }
}
