<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'city',
        'users_id',
        'reference',
        'alias',
        'is_active',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(User::class);
    }
}
