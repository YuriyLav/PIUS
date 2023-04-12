<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($code)
    {
        // Поиск товара по символьному коду
        $product = Product::where('code', $code)->first();

        if (!$product) {
            abort(404); // Ошибка 404, если товар не найден
        }

        return view('product.show', ['product' => $product]);
    }
}
