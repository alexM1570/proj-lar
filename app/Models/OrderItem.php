<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [

        'order_id', 'price', 'quantity', 'discount', 'discount_type', 'subtotal', 'store_id'

    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public static function add($cartItem, $order)
    {
        $item = new static;
        $item -> order_id = $order->id;
        $item->price = $cartItem->price;
        $item->quantity = $cartItem -> quantity;
        $item -> subtotal = $cartItem -> price * $cartItem -> quantity;
        $item->store_id = $cartItem -> store_id;
        $item -> save();
               
      
        return $item;
    }
}
