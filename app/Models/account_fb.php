<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account_fb extends Model
{
    use HasFactory;
    protected $table = 'account_fbs';
    protected $primaryKey = 'id';
    protected $fillable = ['type','acc', 'status', 'notice'];
}
