<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    // Active la fonctionnalité de "soft delete" (suppression logique)
    // Cela permet de marquer une tâche comme supprimée sans l'effacer définitivement de la base de données
    use SoftDeletes;

    // Définit les attributs pouvant être remplis en masse via create(), update(), etc.
    protected $fillable = ['title', 'is_completed'];

    // Cast automatique du champ 'is_completed' en booléen (true/false)
    // Permet de s'assurer que les valeurs récupérées depuis la base soient bien du type booléen
    protected $casts = [
        'is_completed' => 'boolean',
    ];
}
