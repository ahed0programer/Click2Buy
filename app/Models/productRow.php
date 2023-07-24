<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productRow extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'product_id',
        'row_id',
    ];

    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function row()
    {
        return $this->belongsTo(Row::class);
    }
}
