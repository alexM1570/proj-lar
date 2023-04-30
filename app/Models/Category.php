<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

protected $fillable = ["name"];

public function groups()
{

    return $this->belongsToMany(Group::class);

}

public function Cards()
{
    return $this->hasMany(Card::class);
}


}
