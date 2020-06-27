<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusOrder extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'status_order';

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
                  'order_id',
                   'status'
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
     * Get the Order for this model.
     *
     * @return App\Models\Orders
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Orders','order_id','id');
    }

}
