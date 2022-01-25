@extends('layouts.main')

@section('title-block')Новость@endsection

@section('content')
<div>
    <strong>{{ $news->title }}</strong>
    <p>{!! $news->description !!}</p>
    <em>Автор: {{ $news->author }}</em>
    <hr>
</div>
@endsection