<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'payment',
        'total_quantity'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
