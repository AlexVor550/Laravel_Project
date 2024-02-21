@extends('layouts.products')

<head>
    <title>Product</title>
</head>
@section('navlink')
@endsection
@section('content')
    <div class="p-5 text-center bg-image"
        style="
      background-image: url('https://img.goodfon.ru/original/2880x1800/b/9a/nike-sneakers-sport-shoe.jpg');
      background-size: cover;
height: 300px;


    ">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.7)">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3">Shop</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Background image -->

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <!-- Section: Sidebar -->
                    <section>
                        <!-- Section: Filters -->
                        <section id="filters" data-auto-filter="true">
                            <h5>Filters</h5>
                            <form action="{{ route('product.index') }}" method="GET">
                                <!-- Section: Price -->
                                <section class="mb-4">
                                    <h6 class="font-weight-bold mb-3">Category</h6>

                                    <select name="category" id="category" class="form-select"
                                        aria-label="Default select example">
                                        <option value="">Категория</option>
                                        <option value="Casual">casual</option>
                                        <option value="sandals">sandals</option>
                                        <option value="kids">kids</option>
                                        <option value="sport">sport</option>
                                        <option value="boots">boots</option>
                                    </select>
                                </section>

                                <section class="mb-4">
                                    <h6 class="font-weight-bold mb-3">Price</h6>

                                    <select name="price" id="price" class="form-select"
                                        aria-label="Default select example">
                                        <option value="">Цена</option>
                                        <option value="0-50">До 50$</option>
                                        <option value="50-100">50-100$</option>
                                        <option value="100-150">100 -150$</option>
                                        <option value="150-20000">150 - и выше$</option>
                                    </select>
                                </section>
                                <!-- Section: Price -->

                                <!-- Section: Size -->
                                <section class="mb-4" data-filter="size">
                                    <h6 class="font-weight-bold mb-3">Size</h6>
                                    <select name="size" id="size" class="form-select"
                                        aria-label="Default select example">
                                        <option value="">Размер</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                    </select>

                                </section>
                                <!-- Section: Size -->

                                <!-- Section: Color -->
                                <section class="mb-4" data-filter="color">
                                    <h6 class="font-weight-bold mb-3">Color</h6>

                                    <label for="color">Фильтр по цвету:</label>
                                    <select name="color"class="form-select" aria-label="Default select example"
                                        id="color">
                                        <option value="">Цвета</option>
                                        <option value="black">black</option>
                                        <option value="blue">blue</option>
                                        <option value="green">green</option>
                                        <option value="white">white</option>
                                        <option value="violet">violet</option>
                                        <option value="yellow">yellow</option>
                                    </select>
                                </section>
                                <!-- Section: Color -->
                        </section>
                        <!-- Section: Filters -->
                    </section>
                    <button type="submit" class="btn btn-primary">Применить</button>
                    </form>
                    <!-- Section: Sidebar -->
                </div>
                {{-- Main section --}}
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        <div class="container mt-4">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100 d-flex flex-column zoom">
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                class="card-img-top">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title">${{ $product->price }} </h5>
                                                
                                                <p class="card-text">{{ $product->name }}</p>
                                                <div class="mt-auto">
                                                    <form action="{{ route('cart.add') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                                        <button type="submit" class="btn btn-outline-success">Добавить в
                                                            корзину</button>
                                                    </form>
                                                    <form action="{{ route('favorite.add') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                                    <button type="submit" class="btn btn-outline-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-heart"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15">
                                                            </path>
                                                        </svg>
                                                        
                                                    </button>
                                                </form>
                                                    <a href="{{ route('product.show', $product->id) }}"
                                                        class="btn btn-outline-primary">Подробнее
                                                    </a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


    </main>
@endsection
@section('footer')
@endsection
