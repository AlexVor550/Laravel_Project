@extends('layouts')

@section('navlink')
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Название Category</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Category">
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection


@section('footer')
@endsection
