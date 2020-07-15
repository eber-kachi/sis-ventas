<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreImage extends Model
{
    protected $table = 'store_images';

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'store_id',
        'logo_image',
        'cover_image'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Store','store_id','id');
    }
}
