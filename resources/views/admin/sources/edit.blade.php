@extends('layouts.admin')
@section('title') Добавить источник @endsection
@section('header')
<h1 class="h2">Добавить источник</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">

    </div>

</div>
@endsection
@include('inc.message')

@section('content')
<div>
    <form method="post" action="{{ route('admin.sources.update',['source' => $source] ) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="title">Наименование источника</label>
        <input class="form-control" type="text" name="title" placeholder="Введите название категории" value="{{ $source->title}}" id="title">
    </div>
    <div class="form-group">
        <label for="site">Адрес источника</label>
        <textarea class="form-control" name="site" id="site">{{ $source->site }}</textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
</div>
@endsection
