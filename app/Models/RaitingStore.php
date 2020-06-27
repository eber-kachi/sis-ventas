<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaitingStore extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'raiting_store';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_id',
        'user_id',
        'comentary',
        'start',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the Product for this model.
     *
     * @return App\Models\Product
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store','store_id','id');
    }

    /**
     * Get the User for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

}
