@extends('layouts.admin')
@section('title') Редактировать категорию @endsection
@section('header')
<h1 class="h2">Редактировать категорию</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">

    </div>

</div>
@endsection
@section('content')
@include('inc.message')
<div>
    <form method="post" action="{{ route('admin.profiles.update', ['profile' => $profile]) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="name">Имя</label>
        <input class="form-control" type="text" name="name" placeholder="Введите имя" value="{{ $profile->name }}" id="name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="text" name="email" id="email" value="{{ $profile->email }}">
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input class="form-control" type="password" name="password" placeholder="Введите пароль" id="password">
    </div>
    <div class="form-group">
        <label for="newPassword">Новый пароль</label>
        <input class="form-control" type="password" name="newPassword" placeholder="Введите новый пароль" id="newPassword">
    </div>
    <br>
    <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
</div>
@endsection
