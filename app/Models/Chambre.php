<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperChambre
 */
class Chambre extends Model
{
    use HasFactory;
    protected $guarded = [""];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function imageUrl(): string
    {
        return Storage::disk('public')->url($this->image);
    }

    public function scopeStatus(Builder $builder):Builder
    {
        return $this->where('status',0);
    }
     // Ce que je viens de faire n'est pas solution à ton pb. Mais c'est juste pour te faciliter la gestion des formuaire. Ici on renseigne juste les champs qu'on ne veux pas manipuler dans la BD
    // protected $fillable = [
    //     'image',
    //     'surface',
    //     'capacite',
    //     'adulte',
    //     'enfant',
    //     'prix',
    //     'description',
    //     'status',
    //     'equipment_id',
    //     'feature_id'
    // ];


}
