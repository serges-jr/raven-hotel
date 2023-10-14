<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperEquipment
 */
class Equipment extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'icon',
            'name',
            'description'
        ];
}
