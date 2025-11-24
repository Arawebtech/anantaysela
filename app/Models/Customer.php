<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'customer';
    
    protected $fillable = ['first_name','last_name','email','password','phone_number','address','city','state','zip_code'];

    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'customer_id');
    }

    public function wishlists()
    {
        return $this->hasMany(\App\Models\Wishlist::class, 'customer_id');
    }

    public function carts()
    {
        return $this->hasMany(\App\Models\Cart::class, 'customer_id');
    }
}
