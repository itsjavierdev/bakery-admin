<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Product extends Model
{
    use HasFactory;

    use Sluggable;

    public function Sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class);
    }

    protected $fillable = [
        'name',
        'price',
        'slug',
        'description',
        'category_id',
        'featured'
    ];
}
