@extends('layouts.products')
<title>
    Create product
</title>
@section('navlink')
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Название товара</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Air Jordan">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание товара</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Цена</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="1920">
                @error('price')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Размер</label>
                <input type="text" class="form-control" id="size" name="size" placeholder="42">
                @error('size')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Цвет</label>
                <input type="text" class="form-control" id="color" name="color" placeholder="Blue">
                @error('color')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="stock_quantity" class="form-label">Количество в наличии</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" placeholder="1000">
                @error('stock_quantity')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ссылка на изображение</label>
                <input type="url" class="form-control" id="image" name="image" placeholder="URL товара">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Категория товара</label>
                <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
                    <option selected>Выберите категорию</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection

@section('footer')
@endsection
