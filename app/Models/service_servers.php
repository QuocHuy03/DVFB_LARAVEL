<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_servers extends Model
{
    use HasFactory;

    protected $table = 'service_servers';
    protected $fillable = [
        'type',
        'code_server',
        'name_server',
        'server_service',
        'rate_server',
        'title_server',
        'content_server',
        'status_server',
        'reaction',
        'api_server',
    ];
}
