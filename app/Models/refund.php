<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refund extends Model
{
    protected $table = 'refund';
    protected $fillable = [
        'id', 'order_id', 'refund_amount', 'reason', 'evidence', 'status', 'customer_id', 'created_at', 'updated_at' 
    ];

    public function orders()
    {
        return $this->belongsTo('App\Models\orders', 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\User', 'customer_id');
    }


}
