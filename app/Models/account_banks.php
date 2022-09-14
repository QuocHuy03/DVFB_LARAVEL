<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account_banks extends Model
{
    use HasFactory;

    protected $table = 'account_banks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
        'username',
        'account_name',
        'account_number',
        'password',
        'bank_name',
        'logo',
        'min_bank',
        'notice',
        'token',
    ];
}
