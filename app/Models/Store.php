<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
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
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

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
$store->save();

return $store;
 }
 public function uploadImage($file)
 {

    if($file == null) return false;
    //$ext = $file->extension();
    $filename = $file->getClientOriginalName();
    $path = 'Stores/store_' .$this->id . '/';

    $this->removeImage();
     
    $file->storeAs($path, $filename, 'uploads');

    $this-> image = $path . $filename;
    $this->save();

 }

 public function getImage()
 {

    $image = $this->image;

    if($image){

      return asset('uploads/' .$image);  

    }
  return asset("assets/images/no-image.jpg");
 }

 public function removeImage()
 {
if($this ->image){

    Storage::disk("uploads")->delete($this->image);

    $this-> image = null;
    $this->save();
}

 }
 public function remove()
 {

    $this->removeImage();
    $this->delete();

 }

 public function getPrice()
 {

     return number_format($this->price, 2, '.', ' '). ' ₽';

 }
 
 public function getGroup()
 {
    $group = [];
    foreach($this->groups as $g){
    $group[] ='<a href="#">'. $g->name .'</a>';
    }
    return implode(', ', $group);
 }


}