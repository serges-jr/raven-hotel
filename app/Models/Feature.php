<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperFeature
 */
class Feature extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function chambre(): BelongsToMany
    {
        return $this->belongsToMany(Chambre::class);
    }
    //entre chambre et feature et ajouter les id dans la table feature_chambre
    // c'est normalle que ça ne passe pas. Tu as en principe trois tables que tu es entrain de manipuler. Chambre, feature et feature_chambre Donne moi un instant je guette mon code
}
