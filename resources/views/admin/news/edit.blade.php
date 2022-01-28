@extends('layouts.admin')

@section('title-block')Редактировать новость@endsection

@section('content')<h1>Редактирование новостей</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="title">Наименование</label>
        <input class="form-control" type="text" name="title" placeholder="Введите название новости" value="{{ $news->title }}" id="title">
    </div>

    <div class="form-group">
        <label for="author">Автор</label>
        <input class="form-control" type="text" name="author" placeholder="Введите автора"  name="author" value="{{ $news->author }}" id="author">
    </div>

    <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option value disabled selected>Выберете статус</option>
                    <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>

    <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
    </div>

    <button type="submit" class="btn btn-success mt-5">Отправить</button>
</form>

@endsection