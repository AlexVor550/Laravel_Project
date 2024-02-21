@extends('layouts.products')
<title>Favorite products</title>
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            @foreach ($favorites as $item)
                <div class="col-3 mb-4">
                    <div class="col-12">
                        <div class="card h-100 d-flex flex-column ">
                            <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="card-img-top">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $item->product->name }}</h5>
                                <p class="card-text">${{ $item->product->price }}</p>
                                <div class="mt-auto">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="productId" value="{{ $item->product->id }}">
                                        <button type="submit" class="btn btn-outline-success">Добавить в корзину</button>
                                    </form>
                                    <a href="{{ route('product.show', $item->product->id) }}"
                                        class="btn btn-outline-primary">Подробнее</a>

                                    <form action="{{ route('favorite.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="itemId" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-outline-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z">
                                                </path>
                                            </svg>
                                            Remove from favorite
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('footer')
@endsection
