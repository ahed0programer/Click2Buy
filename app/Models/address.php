<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class address extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'name',
        'parent_id',
    ];

    protected $dates = ['deleted_at'];

    public function deliveryCompany(){
        
        return $this->belongsToMany(deliveryCompany::class);
    }
}
