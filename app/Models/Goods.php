<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'category_id',
        'image',
        'title',
        'description',
        'availability',
        'color',
    ];

    public function Category (): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes (): BelongsToMany
    {
        return $this->belongsToMany(Size::class);
    }

}
