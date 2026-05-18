<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Slider extends Model
{
    protected $fillable = ['name', 'slug'];

    public function items(): HasMany
    {
        return $this->hasMany(SliderItem::class)->where('is_active', true)->orderBy('display_order');
    }
}
