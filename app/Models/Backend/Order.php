<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Order_items;

class Order extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $fillable =[
        'user_id',
        'name',
        'email',
        'address',
        'phone',
        'status',
        'tracking_no'
    ];

    public function orderItems()
    {
        return $this->hasMany(Order_items::class);
    }
}
