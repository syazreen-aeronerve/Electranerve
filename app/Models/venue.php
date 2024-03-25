<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class venue extends Model
{
    use SoftDeletes;
    protected $table = 'venue';
    protected $fillable = [
        'id', 'venue_name', 'venue_address', 'venue_image', 'venue_latitude', 'venue_longitude', 'venue_description', 'venue_capacity', 'created_by', 'created_at', 'updated_by', 'updated_at' 
    ];
}
