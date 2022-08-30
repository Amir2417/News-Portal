<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'favicon_image',
        'logo_image',
        'advertisement_image',
        'status',
    ];
}
