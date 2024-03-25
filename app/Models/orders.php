<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'order_id', 'event_id', 'quantity', 'total_price', 'payment_status', 'first_name', 'last_name', 'email', 'address', 'phone', 'created_at', 'created_by', 'updated_at', 'updated_by', 'transaction_id', 'billcode'
    ];
    protected $primaryKey = 'order_id';

    public function events()
    {
        return $this->belongsTo('App\Models\events', 'event_id')->withTrashed();
    }


    public function customer()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }


    
}
