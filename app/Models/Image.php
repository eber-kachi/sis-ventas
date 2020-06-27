<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

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
                  'title',
                  'image',
                  'ismain'
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


}
