@extends('layouts.admin')

@section('title-block')Добавление новостей@endsection

@section('content')<h1>Добавление новостей</h1>

@include('inc.message')

<form method="post" action="{{ route('admin.news.store') }}">
    @csrf
    <div class="form-group">
        <label for="category_id">Категория</label>
        <select class="form-control" name="category_id" id="category_id">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="title">Наименование</label>
        <input class="form-control" type="text" name="title" placeholder="Введите название новости" value="{{old('title')}}" id="title">
    </div>

    <div class="form-group">
        <label for="author">Автор</label>
        <input class="form-control" type="text" name="author" placeholder="Введите автора"  name="author" value="{{ old('author') }}" id="author">
    </div>

    <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option value disabled selected>Выберете статус</option>
                    <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>

    <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
    </div>

    <button type="submit" class="btn btn-success mt-5">Отправить</button>
</form>

@endsection