<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
    'title',
    'description',
    'price',
    'created_by',
    'cover_image',
];

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }
}
