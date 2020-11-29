<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'products';

    protected $fillable = ['client_id', 'product_id'];

    public function product() {
        return $this->belongsTo('App\Models\Product');
    }
}
