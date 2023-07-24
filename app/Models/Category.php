<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory , SoftDeletes;
    use NodeTrait;

    protected $dates = ['deleted_at'];

    protected $parentColumn = 'parent_id';

    protected $leftColumn = 'lft';

    protected $rightColumn = 'rgt';

    protected $depthColumn = 'depth';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'parent_id',
        'photo'
    ];
    protected $guarded = [
        'id',
        '_lft',
        '_rgt',
    ];

    

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function deleteDescendants()
    {
        $this->descendants()->delete();
    }

    public function rebuildTree()
    {
        $this->getConnection()->transaction(function () {
            $this->rebuild();
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
