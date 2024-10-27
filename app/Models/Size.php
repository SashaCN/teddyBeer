<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'width',
        'height',
    ];

    public function goods (): BelongsToMany
    {
        return $this->belongsToMany(Goods::class);
    }
}
