<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'name',
        'phone',
        'count',
        'status',
    ];

    /**
     * Agar order package bilan bog‘langan bo‘lsa:
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
