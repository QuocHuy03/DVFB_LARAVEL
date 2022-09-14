<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_bank extends Model
{
    use HasFactory;

    protected $table = 'history_banks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
        'username',
        'card_type',
        'card_price',
        'serial',
        'code',
        'thucnhan',
        'noidung',
        'status',
        'date',
        'name',
        'transid',
    ];
}
