<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Group extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name'
    ];

    public function stores()
    {

        return $this->belongsToMany(Store::class);

    }

    public function categories()
    {

        return $this->belongsToMany(Category::class);

    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
        ->generateSlugsFrom('name')
        ->saveSlugsTo('slug');

    }

}
