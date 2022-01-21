@extends('layouts.main')
@section('title')Форма заказа@endsection
@section('header')
<h1 class="h2">Заполните поля</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">

    </div>

</div>
@endsection
@section('content')
<div>
    <form method="post" action="{{ route('order.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Фио</label>
        <input class="form-control" type="text" name="name" placeholder="Введите имя" value="{{old('name')}}" id="name">
    </div>
    <div class="form-group">
        <label for="phone">Телефон</label>
        <input class="form-control" type="tel" name="phone" placeholder="Введите номер" value="{{old('phone')}}" id="phone">
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input class="form-control" type="email" name="email" placeholder="Введите почту" value="{{old('email')}}" id="email">
    </div>
    <div class="form-group">
        <label for="info">Информация</label>
        <textarea class="form-control" name="info" id="info">{!! old('info') !!}</textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
</div>
@endsection
