<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_web extends Model
{
    use HasFactory;

    protected $table = 'sub_webs';

    protected $fillable = [
        'username',
        'api_token',
        'domain',
    ];

    protected $primaryKey = 'id';

    protected $hidden = [
        'api_token',
    ];
}
