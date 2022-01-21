@extends('layouts.main')
@section('title') Обратная связь@endsection
@section('header')
<h1 class="h2">Заполните поля</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">

    </div>

</div>
@endsection
@section('content')
<div>
    <form method="post" action="{{ route('feedback.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Фио</label>
        <input class="form-control" type="text" name="name" placeholder="Введите имя" value="{{old('name')}}" id="name">
    </div>
    <div class="form-group">
        <label for="description">Комментарии</label>
        <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
</div>
@endsection
