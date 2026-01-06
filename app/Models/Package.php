<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'avia_id',
        'photo',
        'ticket_type_id',
        'price',
        'name',
        'total_duration',
        'departure_time',
        'arrival_time',
        'visa_type',
        'origin_city',
        'stopover_cities',
        'destination_city',
        'food',
        'ambulance',
        'taxi_service',
        'gift',
        'package_info',
        'hotel_name',
        'hotel_distance',
        'hotel_star_count',
        'hotel_info',
        'hotel_image1',
        'hotel_image2',
        'hotel_image3',
        'advantages',
        'count'
    ];

    protected $casts = [
        'advantages' => 'array',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function avia()
    {
        return $this->belongsTo(Company::class, 'avia_id', 'id');
    }

    public function ticket()
    {
        return $this->belongsTo(TicketType::class, 'ticket_type_id');
    }

    public function advantages()
    {
        return $this->belongsToMany(Advantage::class, 'package_advantage', 'package_id', 'advantage_id');
    }
}
