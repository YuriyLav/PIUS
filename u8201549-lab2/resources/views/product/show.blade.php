<!DOCTYPE html>
<html>
    <head>
        <title>Просмотр товара</title>
    </head>
    <body>
        <h1>{{ $product->name }}</h1> 
        
        <img src="{{ $product->image }}" alt="{{ $product->name }}" /> 
        
        <p>Идентификатор: {{ $product->id }}</p> 
        <p>Символьный код: {{ $product->code }}</p> 
        <p>Описание: {{ $product->description }}</p> 
        <p>Дата и время создания: {{ $product->created_at->format('d.m.Y H:i') }}</p> 
        <p>Цена: {{ $product->price }} руб.</p> 
        <p>Количество на складе: {{ $product->quantity }}</p> 
    </body>
</html>
