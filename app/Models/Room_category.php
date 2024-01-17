<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room_category extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'room_category';
    protected $guraded = ['id_category'];

    public function images()
    {
        return $this->hasMany(Room_category_image::class, 'room_category_id', 'id_category');
    }
    public function pricelist()
    {
        return $this->hasMany(Pricelist::class, 'room_category', 'id_category')->orderBy('price', 'asc');
    }
}
