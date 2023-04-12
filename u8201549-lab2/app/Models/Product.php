<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'description', 'created_at_datetime', 'price', 'image', 'quantity'];

    // Многие-к-одному: товар принадлежит определенной категории
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
