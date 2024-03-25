<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class events extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'event_id', 'event_name', 'event_date', 'event_time', 'event_venue', 'event_ticket_price', 'event_earlybird_discount', 'event_earlybird_discount_end_date', 'event_earlybird_discount_end_time', 'event_description', 'event_image', 'event_total_ticket', 'event_duration_hours','genre','created_at', 'created_by', 'updated_at', 'updated_by'
    ];

    use SoftDeletes;

    protected $primaryKey = 'event_id';

    
    public function venue()
    {
        return $this->belongsTo('App\Models\venue', 'event_venue')->withTrashed();
    }

    public function getgenre()
    {
        return $this->belongsTo('App\Models\event_genre', 'genre');
    }
    public function organiser()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    
}
