<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

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
    $originalFilename = 'image_' . $this->id . '.' . $file->extension();
    $middleFilename = 'image_' . $this->id . '_middle.' . $file->extension();
    $smallFilename = 'image_' . $this->id . '_small.' . $file->extension();
    $path = 'Stores/store_' .$this->id . '/';
 

    if(!File::exists('uploads/' .$path)){
        File::makeDirectory('uploads/' . $path);
    }

    $compressImageFull = Image::make($file);
    $compressImageFull->save('uploads/' . $path . '/' . $originalFilename, 100);

        $compressImageMiddle = Image::make($file); 
        $compressImageMiddle->resize(600, null, function ($constraint) {
        $constraint->aspectRatio();
        })->save('uploads/' . $path . '/' . $middleFilename, 100);

      
    $compressImageSmall = Image::make($file);
    $compressImageSmall->resize(300, null, function ($constraint) {
    $constraint->aspectRatio();
    })->save('uploads/' . $path . '/' . $smallFilename, 100);

    $this->removeImage();
    $file->storeAs($path, $originalFilename, 'uploads');
    $this-> image = $path . $originalFilename;
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