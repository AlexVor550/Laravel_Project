@extends('layouts')

@section('navlink')
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf 
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Название товара</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Пример текстового поля</label>
                <textarea class="form-control" id="description" name="description" rows="3" value="{{$product->description}}"></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Цена</label>
                <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Размер</label>
                <input type="text" class="form-control" id="size" name="size" value="{{$product->size}}">
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Цвет</label>
                <input type="text" class="form-control" id="color" name="color"value="{{$product->color}}">
            </div>
            <div class="mb-3">
                <label for="stock_quantity" class="form-label">Количество в наличии</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="{{$product->stock_quantity}}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ссылка на изображение</label>
                <input type="url" class="form-control" id="image" name="image" value="{{$product->image}}">
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection


@section('footer')
@endsection
