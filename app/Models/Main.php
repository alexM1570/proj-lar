<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    use HasFactory;
    public function getImage()
    {
   
       $image = $this->image;
   
       if($image){
   
         return asset('uploads/' .$image);  
   
       }
     return asset("assets/images/no-image.jpg");
    }

}
