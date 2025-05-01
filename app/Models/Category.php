<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'family_id'
    ];

//  Relación muchos a uno con Family
    public function family()
    {
        return $this->belongsTo(Family::class);
    }
//    Relación  uno a muchos con Subcategory
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
