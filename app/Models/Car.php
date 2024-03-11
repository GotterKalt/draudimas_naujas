<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg_number',
        'brand',
        'model',
        'owner_id',
    ];

    // Другие отношения и методы могут быть добавлены здесь

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
