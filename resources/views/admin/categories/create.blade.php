@extends('layouts.admin')
@section('title') Добавить категорию @endsection
@section('header')
<h1 class="h2">Добавить категорию</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">

    </div>

</div>
@endsection
@section('content')
<div>
    <form method="post">
    @csrf
    <div class="form-group">
        <label for="title">Наименование категории</label>
        <input class="form-control" type="text" name="name" placeholder="Введите название категории" value="{{old('name')}}" id="name">
    </div>
    <div class="form-group">
        <label for="description">Описание категории</label>
        <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
</div>
@endsection
