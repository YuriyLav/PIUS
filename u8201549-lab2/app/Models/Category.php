<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'code', 'activity', 'created_at_date'];

    // Один-ко-многим: одна категория может содержать много товаров
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Многие-к-одному: категория принадлежит определенной родительскомй категории
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Один-ко-многим: у категории может быть много дочерних категорий
    public function childCategory()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
