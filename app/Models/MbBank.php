<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MbBank extends Model
{
    use HasFactory;
    protected $table = 'mbbanks';
    protected $fillable = [
        'accountNo',
        'transactionId',
        'creditAmount',
        'transactionDate',
        'availableBalance',
        'description',
        'id_username'
    ];
}
