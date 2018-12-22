<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fk_user_id','fk_order_status_id','order_details','created_at','updated_at'
    ];
}
