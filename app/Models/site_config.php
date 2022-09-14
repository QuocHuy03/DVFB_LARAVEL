<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class site_config extends Model
{
    use HasFactory;

    protected $table = 'site_configs';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'value'];
    public $timestamps = false;

    public static function getValuebyName($name){
        $config = site_config::where('name', $name)->first();
        return $config->value;
    }
}
