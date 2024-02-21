@extends('layouts.admin')

@section('main')
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Email</th>
            <th scope="col">Тема</th>
            <th scope="col">Сообщение</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contact as $contacts)
        <tr>
            <th scope="row">{{$contacts->id}}</th>
            <td>{{$contacts->name}}</td>
            <td>{{$contacts->email}}</td>
            <td>{{$contacts->subject}}</td>
            <td>{{$contacts->message}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection