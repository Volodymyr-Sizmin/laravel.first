<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function status()
    {
        $this->belongsTo(OrderStatus::class);
    }

    public function products()
    {
        $this->belongsToMany(Product::class)->withPivot(['quantity', 'single_price']);
    }
}
