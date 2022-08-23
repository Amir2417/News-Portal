<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'fb_url',
        'twitter_url',
        'linkedin_url',
        'lctn_add',
        'lctn_phone',
        'lctn_email',
        'contact_name',
        'contact_email',
        'contact_subject',
        'contact_message',
    ];
}
