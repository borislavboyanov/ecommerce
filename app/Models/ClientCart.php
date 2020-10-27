<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientCart extends Model
{
    protected $table = 'client_carts';

    protected $fillable = ['client_id', 'product_id', 'quantity', 'price'];

    public function product() {
        return $this->belongsTo('App\Models\Product');
    }
}
