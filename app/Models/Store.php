<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Store extends Model
{
    use HasFactory, HasSlug;

    protected $fillable =[

        'price',
        'info',
        'image',
        'category_id'
         
    ];

    public function category()
    {

        return $this->belongsTo(Category::class);

    }

    public function getSlugOptions() : SlugOptions
 {
 return SlugOptions::create()
 -> generateSlugsFrom('info')
 -> saveSlugsTo('slug');
 }

 public static function add($input)
 {

$store = new static;
$store->fill($input);
$store->category_id=$input["category"];
$store->group=$input["group"];
$store->save();

return $store;
 }
}