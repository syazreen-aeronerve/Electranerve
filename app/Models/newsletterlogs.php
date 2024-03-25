<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsletterlogs extends Model
{
    protected $table = 'newsletterlogs';
    protected $fillable = [
        'id', 'customer_id', 'week', 'created_at', 'updated_at' 
    ];
}
