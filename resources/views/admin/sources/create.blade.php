@extends('layouts.admin')
@section('title') Добавить источник @endsection
@section('header')
<h1 class="h2">Добавить источник</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
    </div>
</div>
@endsection

@section('content')
@include('inc.message')
<div>
    <form method="post" action="{{ route('admin.sources.store') }}">
    @csrf
    <div class="form-group">
        <label for="title">Наименование источника</label>
        <input class="form-control" type="text" name="title" placeholder="Введите название категории" value="{{old('title')}}" id="title">
    </div>
    <div class="form-group">
        <label for="site">Адрес источника</label>
        <textarea class="form-control" name="site" id="site">{!! old('site') !!}</textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
</div>
@endsection
