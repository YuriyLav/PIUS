<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function show(Request $request, $code)
    {
        // Поиск категории по символьному коду
        $category = Category::where('code', $code)->first();
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        if (!$category->activity || !$category) {
            abort(404); // Ошибка 404, если категория не найдена или не активна
        }

        // Получение всех товаров в данной категории с постраничной навигацией и фильтрацией по цене
        $products = Product::where('category_id', $category->id)
            ->when($minPrice, function ($query) use ($minPrice) {
            return $query->where('price', '>=', $minPrice);
        })
        ->when($maxPrice, function ($query) use ($maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })
        ->paginate(10);

        return view('category.show', ['category' => $category, 'products' => $products]);
    }
}
