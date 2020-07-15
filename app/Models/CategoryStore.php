<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryStore extends Model
{
    protected $table = 'categories_store';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name'
    ];

    public function store()
    {
        return $this->hasOne('App\Models\Store','categorie_store_id','id');
    }
}
