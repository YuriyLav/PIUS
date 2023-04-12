<!DOCTYPE html>
<html>
    <head>
        <title>Просмотр категории</title>
    </head>
    <body>
        <form method="get" action="{{ route('category.show', $category->code) }}"> {{-- Форма фильтра по цене --}}
            <label for="min_price">Минимальная цена:</label>
            <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" />

            <label for="max_price">Максимальная цена:</label>
            <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" />

            <button type="submit">Фильтровать</button>
        </form>
        <h1>{{ $category->name }}</h1> 

        @if ($products->isEmpty()) 
            <p>Нет товаров в данной категории.</p>
        @else 
            <ul>
                @foreach ($products as $product)
                    <li>
                        <h3>{{ $product->name }}</h3> 
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" /> 
                        <p>Цена: {{ $product->price }} руб.</p> 
                    </li>
                @endforeach
            </ul>
            {{-- Отображение постраничной навигации --}}
            {{ $products->links() }}
        @endif
    </body>
</html>
