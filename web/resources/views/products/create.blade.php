@extends('layouts.app')

@section('content')
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Назва продукту:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="price">Ціна:</label>
    <input type="text" id="price" name="price" required><br><br>

    <label for="rating">Рейтинг:</label>
    <input type="text" id="rating" name="rating" required><br><br>

    <label for="num_reviews">Кількість оглядів:</label>
    <input type="number" id="num_reviews" name="num_reviews" required><br><br>

    <label for="image">Зображення продукту:</label>
    <input type="file" id="image" name="image" required><br><br>

    <label for="sale">Розпродаж:</label>
    <input type="hidden" name="sale" value="0">
    <input type="checkbox" id="sale" name="sale" value="1"><br><br>


    <label for="link">Посилання на продукт:</label>
    <input type="url" id="link" name="link" required><br><br>

    <input type="submit" value="Додати продукт">
</form>
@endsection
