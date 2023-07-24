<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'size',
    ];

    protected $dates = ['deleted_at'];

    public function products(){
        
        return $this->belongsToMany(Product::class);
    }
}

