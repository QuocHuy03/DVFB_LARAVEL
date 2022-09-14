<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notice_accfbs extends Model
{
    use HasFactory;
    protected $table = 'notice_accfbs';
    protected $fillable = ['type', 'content', 'price'];

    public function content($type){
        $notice = notice_accfbs::where('type', $type)->first();
        return $notice->content;
    }   
    public function price($type){
        $notice = notice_accfbs::where('type', $type)->first();
        return $notice->price;
    }
}

