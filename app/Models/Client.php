<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'clients';

    protected $fillable = ['uuid', 'email', 'password', 'fullName', 'activationKey', 'passwordRecovery'];

    protected $hidden = ['password', 'remember_token'];

    public function items() {
        return $this->hasMany('App\Models\ClientCart');
    }

    public function wishlist() {
        return $this->hasMany('App\Models\Wishlist');
    }
}
