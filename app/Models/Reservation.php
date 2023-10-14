<?php

namespace App\Models;

use App\Models\Menage;
use App\Models\Chambre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperReservation
 */
class Reservation extends Model
{
    use HasFactory;
    protected $guarded = [""];
    public function chambre()
    {
        return $this->belongsTo(Chambre::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menage()
    {
        return $this->hasMany(Menage::class);
    }
}
