<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'subcat_id',
        'name',
        'location',
        'date',
        'tags',
        'title',
        'image',
        'latest_news',
        'sports',
        'long_description',

    ];
    public function category(){
        return $this->belongsTo(Category::class,'cat_id','id');
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcat_id','id');
    }
}
