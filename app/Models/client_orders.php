<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_orders extends Model
{
    use HasFactory;
    protected $table = 'client_orders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'type',
        'amount',
        'time_order',
        'total_money',
        'price',
        'link_order',
        'server_order',
        'type_order',
        'status',
        'code_order',
        'id_order',
        'ghichu',
        'type_service',
    ];
}
