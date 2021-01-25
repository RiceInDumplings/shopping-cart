<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
    ];

    public function getOrders()
    {
        return $this->latest()->get();
    }

    public function orderAlreadyExist(User $user, Product $product)
    {
        return $this->where(['user_id' => $user->id, 'product_id' => $product->id])->exists();
    }

    public function getOrder(User $user, Product $product)
    {
        return $this->where(['user_id' => $user->id, 'product_id' => $product->id])->first();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
