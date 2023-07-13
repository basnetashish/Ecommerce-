<?php

namespace App\Models\Backend;
use App\Models\Backend\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    use HasFactory;
    protected $table ='order_items';
    protected $fillable =
    [
        'order_id',
        'prod_id',
        'qty',
        'price'
    ];
    public function Products()
    {
        return $this->belongsTo(Product::class, 'prod_id','id');
    }
}
