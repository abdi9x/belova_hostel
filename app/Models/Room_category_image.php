<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_category_image extends Model
{
    use HasFactory;
    protected $table = 'room_category_image';
    protected $guarded = ['id'];
}
