@extends('layouts.products')

<head>
    <title>{{ $product->name }}</title>
</head>
@section('navlink')
@endsection

@section('content')
<style></style>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="{{$product->image}}" width="450" /> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Orianz</span>
                                <h5 class="text-uppercase">Men's slim fit t-shirt</h5>
                                <div class="price d-flex flex-row align-items-center"> 
                                    <div class="ml-2"> <small class="dis-price">${{$product->price}}</small></div>
                                </div>
                            </div>
                            <p class="about">{{$product->description}}</p>
                            <div class="sizes mt-5">
                                <h6 class="text-uppercase">Size</h6> 
                                <label class="radio"> <input type="radio" name="size" value="39" checked> <span>39</span> </label>
                                    <label class="radio"> <input type="radio" name="size" value="40" checked> <span>40</span> </label>
                                    <label class="radio"> <input type="radio" name="size" value="41"> <span>41</span> 
                                    </label> <label class="radio"> <input type="radio" name="size" value="42"> <span>42</span> </label>
                                    <label class="radio"> <input type="radio" name="size" value="44"> <span>44</span> </label>
                                
                            </div>
                            <form action="{{ route('product.rating', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                <div class="sizes mt-3">
                                <h6 class="text-uppercase">Оцените товар</h6> 
                                <select name="rating" id="rating">
                                    <option value="1">1 звезда</option>
                                    <option value="2">2 звезды</option>
                                    <option value="3">3 звезды</option>
                                    <option value="4">4 звезды</option>
                                    <option value="5">5 звезд</option>
                                </select>
                                <button type="submit" class="btn btn-outline-success">Оценить</button>
                                </div>
                            </form>
                            <div class="cart mt-4 align-items-center"> <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-outline-success">Добавить в корзину</button>
                            </form> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
    </section>
@endsection
@section('footer')
@endsection
