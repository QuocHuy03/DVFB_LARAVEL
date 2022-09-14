<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notice extends Model
{
    use HasFactory;

    protected $table = 'notices';

    protected $fillable = [
        'title',
        'content',
        'created_at',
        'updated_at',
    ];
}
