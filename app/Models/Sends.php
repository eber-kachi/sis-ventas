<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sends extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sends';

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
                  'cost'
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
     * Get the order for this model.
     *
     * @return App\Models\Order
     */
    public function order()
    {
        return $this->hasOne('App\Models\Order','send_id','id');
    }

}
