<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class block_ips extends Model
{
    use HasFactory;
    protected $table = 'block_ips';
    protected $primaryKey = 'id';
    protected $fillable = ['ip', 'reason'];
}
