<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announcement extends Model
{
    protected $table = 'announcement';
    protected $fillable = [
        'id', 'title', 'announcement', 'created_by', 'created_at', 'updated_at'
    ];

    public function organiser()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}
