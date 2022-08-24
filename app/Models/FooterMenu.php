<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterMenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'general_menu_id',
        'title',
        'link',
        'status',
    ];
    public function general_menu(){
        return $this->belongsTo(GeneralMenu::class,'general_menu_id','id');
    }
}
