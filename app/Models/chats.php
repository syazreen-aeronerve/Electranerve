<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chats extends Model
{
    protected $table = 'chats';
    protected $fillable = [
       'customer_id', 'organiser_id', 'sent_by', 'message', 'created_at', 'updated_at'
    ];

    public function organiser()
    {
        return $this->belongsTo('App\Models\User', 'organiser_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\User', 'customer_id');
    }
}
