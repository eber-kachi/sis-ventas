<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stores';

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
                  'user_id',
                  'name',
                  'location',
                  'email',
                  'phone'
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
     * Get the User for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    /**
     * Get the product for this model.
     *
     * @return App\Models\Product
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product','store_id','id');
    }

    /**
     * Get the raitingStore for this model.
     *
     * @return App\Models\RaitingStore
     */
    public function raitingStore()
    {
        return $this->hasOne('App\Models\RaitingStore','store_id','id');
    }

}
