@extends('layouts.admin')

@section('title-block')Добавление новостей@endsection

@section('content')<h1>Добавление новостей</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{route('news-form')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name"></label>
        <input class="form-control" type="text" name="name" placeholder="Введите название новости" id="name">
    </div>

    <div class="form-group">
        <label for="desc"></label>
        <input class="form-control" type="text" name="desc" placeholder="Введите краткое описание новости" id="desc">
    </div>

    <div class="form-group">
        <label for="description"></label>
        <textarea class="form-control" type="text" name="description" placeholder="Введите описание новости" id="description"></textarea>
    </div>

    <button type="submit" class="btn btn-success mt-5">Отправить</button>
</form>

@endsection