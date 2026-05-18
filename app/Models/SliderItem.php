<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SliderItem extends Model
{
    protected $fillable = ['slider_id', 'title', 'image_path', 'link', 'display_order', 'is_active'];

    public function slider(): BelongsTo
    {
        return $this->belongsTo(Slider::class);
    }
}
