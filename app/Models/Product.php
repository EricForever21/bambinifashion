<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'price',
        'brandid',
        'created_at',
        'updated_at'
    ];

    public function Brand(){
        return $this->belongsTo('App\Models\Brand','brandid','id');
    }
}
