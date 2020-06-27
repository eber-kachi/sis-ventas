<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
                  'sub_category_id',
                  'title',
                  'price',
                  'description',
                  'stock'
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
     * Get the Store for this model.
     *
     * @return App\Models\Store
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store','store_id','id');
    }

    /**
     * Get the SubCategory for this model.
     *
     * @return App\Models\SubCategory
     */
    public function sub_category()
    {
        return $this->belongsTo('App\Models\SubCategory','sub_category_id','id');
    }

    /**
     * Get the image for this model.
     *
     * @return App\Models\Image
     */
    public function image()
    {
        return $this->hasOne('App\Models\Image','product_id','id');
    }

    /**
     * Get the maker for this model.
     *
     * @return App\Models\Maker
     */
    public function maker()
    {
        return $this->hasOne('App\Models\Maker','product_id','id');
    }

    /**
     * Get the orderDetail for this model.
     *
     * @return App\Models\OrderDetail
     */
    public function orderDetail()
    {
        return $this->hasOne('App\Models\OrderDetail','product_id','id');
    }

    /**
     * Get the raitingProduct for this model.
     *
     * @return App\Models\RaitingProduct
     */
    public function raiting_product()
    {
        return $this->hasOne('App\Models\RaitingProduct','product_id','id');
    }



}
