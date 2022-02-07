@extends('layouts.admin')
@section('title') Редактирование профиля @endsection
@section('header')
<h1 class="h2">Редактирование профиля</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">

    </div>

</div>
@endsection
@section('content')
    @include('inc.message')
    <form method="post" action="{{ route('admin.updateProfile') }}">
        @csrf
    <div class="form-group">
        <label for="name">Имя пользователя</label>
        <input class="form-control" type="text" name="name" placeholder="Введите имя" value="{{ $user->name }}" id="name"><br>
    <div>
    <div class="form-group">
        <label for="name">Email пользователя</label>
        <input class="form-control" type="text" name="email" placeholder="Введите email" value="{{ $user->email }}" id="email"><br>
    <div>
    <div class="form-group">
        <label for="name">Текущий пароль</label>
        <input class="form-control" type="password" name="password" placeholder="Введите текущий пароль"><br>
    <div> 
    <div class="form-group">    
        <label for="newPassword">Новый пароль</label>
        <input class="form-control" type="password" name="newPassword" placeholder="Введите новый пароль"><br>
    <div> 

        <button class="btn btn-success" type="submit">Изменить</button>
    </form>
 
@endsection