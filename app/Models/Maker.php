<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'makers';

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
                  'product_id',
                  'name',
                  'location',
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
     * Get the Product for this model.
     *
     * @return App\Models\Product
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */

}
