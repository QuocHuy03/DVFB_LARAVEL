<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account_history extends Model
{
    use HasFactory;

    protected $table = 'account_histories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'content',
        'type',
    ];
}
