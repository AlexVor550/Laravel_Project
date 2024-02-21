
<div class="container mt-4">
    <div class="row">
        @foreach ($filteredProducts as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 d-flex flex-column">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('product.edit', $product->id) }}"
                                class="btn btn-primary">Редактировать</a>
                            <a href="{{ route('product.destroy', $product->id) }}"
                                class="btn btn-danger">Удалить</a>
                            <a href="{{ route('product.show', $product->id) }}"
                                class="btn btn-secondary">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>