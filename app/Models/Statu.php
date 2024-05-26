<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    use HasFactory;

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function lotissements(): HasMany
    {
        return $this->hasMany(Lotissement::class);
    }

    public function livraisons(): HasMany
    {
        return $this->hasMany(Livraisons::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Tasks::class);
    }
}
