<?php

namespace App\Models\Backend;
use App\Models\Backend\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table ='categories';
    protected $fillable =[
        'parent_id',
        'name',
        'slug',
        'description',
        'status',
        'popular',
        'image',
        'meta_title',
        'meta_descrip',
        'meta_keywords'
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

}
