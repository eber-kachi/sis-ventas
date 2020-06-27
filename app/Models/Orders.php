<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

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
                  'send_id',
                  'total_amount',
                  'total_quantity',
                  'location',
                  'active'
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
     * Get the Send for this model.
     *
     * @return App\Models\Send
     */
    public function send()
    {
        return $this->belongsTo('App\Models\Send','send_id','id');
    }

    /**
     * Get the orderDetail for this model.
     *
     * @return App\Models\OrderDetail
     */
    public function orderDetail()
    {
        return $this->hasOne('App\Models\OrderDetail','order_id','id');
    }

    /**
     * Get the statusOrder for this model.
     *
     * @return App\Models\StatusOrder
     */
    public function statusOrder()
    {
        return $this->hasOne('App\Models\StatusOrder','order_id','id');
    }

}
