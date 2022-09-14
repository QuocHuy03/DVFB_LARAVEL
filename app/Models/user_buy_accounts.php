<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_buy_accounts extends Model
{
    use HasFactory;
    protected $table = 'user_buy_accounts';
    protected $primaryKey = 'id';
    protected $fillable = ['type', 'username', 'notice'];
}
