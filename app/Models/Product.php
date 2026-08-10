<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getLocalizedNameAttribute()
    {
        return \Illuminate\Support\Facades\App::getLocale() === 'ar' && $this->name_ar ? $this->name_ar : $this->name;
    }

    public function getLocalizedDescriptionAttribute()
    {
        return \Illuminate\Support\Facades\App::getLocale() === 'ar' && $this->description_ar ? $this->description_ar : $this->description;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
