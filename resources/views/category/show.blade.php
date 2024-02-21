@extends('layouts')
@section('navlink')
@endsection

@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <div class="card" style="border-radius: 15px;">
            <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light"
              data-mdb-ripple-color="light">
              <img src="{{ $product->image }}" alt="{{ $product->name }}" 
                style="border-top-left-radius: 15px; border-top-right-radius: 15px;" class="img-fluid"
                alt="Laptop" />
              <a href="#!">
                <div class="mask"></div>
              </a>
            </div>
            <div class="card-body pb-0">
              <div class="d-flex justify-content-between">
                <div>
                  <p><a href="#!" class="text-dark">{{ $product->name }}</a></p>
                  <p class="small text-muted">{{ $product->description }}</p>
                </div>
                <div>
                </div>
              </div>
            </div>
            <hr class="my-0" />
            <div class="card-body pb-0">
              <div class="d-flex justify-content-between">
                <p><a href="#!" class="text-dark">{{ $product->price }}</a></p>
                <p class="text-dark">В наличии {{ $product->stock_quantity }}</p>
                <p class="text-dark">Размер {{ $product->size }}</p>
              </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                <a href="{{ route('product.index') }}" class="text-dark fw-bold">Назад</a>
                <button type="button" class="btn btn-primary">Купить</button>
                
                
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