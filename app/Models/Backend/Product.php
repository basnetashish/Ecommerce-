<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Category;

class Product extends Model
{
    use HasFactory;

    protected $table='products';
    protected $fillable =[
    'cate_id',
    'slug',
    'name',
    'small_description',
    'description',
    'orginal_price',
    'selling_price',
    'image',
    'qty',
    'tax',
    'status',
    'trending',
    'meta_title',
    'meta_descrip',
    'meta_keywords'
];

public function category(){
    return $this->belongsTo(Category::class,'cate_id','id');
}

public function subcategory()
{
    return $this->belongsTo(Category::class,'subcategory_id','id');
}

}
