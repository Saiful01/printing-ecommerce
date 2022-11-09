<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps=true;
    protected $guarded=[];
    public  function orderItems(){
        return $this->hasMany(OrderDetails::class);
    }
    public  function payment(){
        return $this->belongsTo(Payment::class);
    }
}
