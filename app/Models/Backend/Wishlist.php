<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Product;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $fillable =
    [
        'user_id',
        'prod_id',
        'prod_qty'
    ];
    
    public function  Products()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }
}
