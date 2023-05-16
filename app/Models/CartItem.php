<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id', 'store_id', 'price', 'quantity',  'discount', 'discount_type', 'sub_total'
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function subTotal()
    {

        return number_format($this->sub_total, 2, '.', ' ') . ' ₽';
    }

  

   
}
