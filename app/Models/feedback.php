<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    protected $table = 'feedback';
    protected $fillable = [
        'id', 'order_id', 'customer_id', 'star', 'feedback', 'created_at', 'updated_at' 
    ];

    protected $primaryKey = 'id';

    protected $hidden = [];

    public function customer()
    {
        return $this->belongsTo('App\Models\User', 'customer_id');
    }

    public function orders()
    {
        return $this->belongsTo('App\Models\orders', 'order_id');
    }

}
