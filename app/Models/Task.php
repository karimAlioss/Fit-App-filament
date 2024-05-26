<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    public function livraison(): BelongsTo
    {
        return $this->belongsTo(Livraison::class);
    }

    public function statu(): BelongsTo
    {
        return $this->belongsTo(Statu::class);
    }
}
