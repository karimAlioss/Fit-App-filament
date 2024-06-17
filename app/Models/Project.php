<?php

namespace App\Models;

use App\Models\Scopes\TeamScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'amao',
        'amoe',
        'type_id',
        'method_id',
        'sponsor_id',
        'prestataire_id',
        'statu_id',
        'team_id',
        'created_at',
    ];

    public function lotissements(): HasMany
    {
        return $this->hasMany(Lotissement::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function method(): BelongsTo
    {
        return $this->belongsTo(Method::class);
    }

    public function sponsor(): BelongsTo
    {
        return $this->belongsTo(Sponsor::class);
    }

    public function prestataire(): BelongsTo
    {
        return $this->belongsTo(Prestataire::class);
    }

    public function statu(): BelongsTo
    {
        return $this->belongsTo(Statu::class);
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new TeamScope);
    }
}
