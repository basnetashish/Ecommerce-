<?php

namespace App\Models\Backend;
use App\Models\Backend\Product;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table='carts';
    protected $fillable =['user_id','prod_id','prod_qty'];

    public function  Products()
    {
        return $this->belongsTo(Product::class , 'prod_id','id');
    }

    public function  Users()
    {
        return $this->belongsTo(User::class , 'user_id','id');
    }
}
