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
<div>
    <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="title">Наименование категории</label>
        <input class="form-control" type="text" name="title" placeholder="Введите название категории" value="{{ $category->title }}" id="title">
    </div>
    <div class="form-group">
        <label for="description">Описание категории</label>
        <textarea class="form-control" name="description" id="description">{!! $category->description !!}</textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
</div>
@endsection
