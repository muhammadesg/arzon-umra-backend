<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable=['image', 'name' , 'info', 'goal_info', 'advantages_info', 'story_info', 'brand', 'hotel', 'customer', 'follower'];
}
