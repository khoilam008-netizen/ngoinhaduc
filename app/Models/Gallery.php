<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'cover_image', 'display_order', 'is_active'];

    public function images(): HasMany
    {
        return $this->hasMany(GalleryImage::class)->orderBy('display_order');
    }
}
