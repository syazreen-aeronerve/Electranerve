<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class event_genre extends Model
{
    protected $table = 'event_genre';
    protected $fillable = [
        'id', 'genre', 'created_at', 'updated_at'
    ];


}
