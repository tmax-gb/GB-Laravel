@extends('layouts.admin')
@section('title') Список источников @endsection
@section('header')
    <h1 class="h2">Список источников</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.sources.create') }}"
               type="button" class="btn btn-sm btn-outline-secondary">Добавить источник</a>
        </div>

    </div>
@endsection
@section('content')
<div class="table-responsive">
    @include('inc.message')
        <table class="table table-bordered">
            <thead>
               <tr>
                   <th>#ID</th>
                   <th>Заголовок</th>
                   <th>URL</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
              @forelse($sourceList as $source)
                  <tr>
                      <td>{{ $source->id }}</td>
                      <td>{{ $source->title }}</td>
                      <td>{{ $source->site }}</td>
                      <td>
                          <a href="{{ route('admin.sources.edit', ['source' => $source]) }}">Ред.</a> &nbsp;
                          <a href="javascript:;" style="color:red;">Уд.</a>
                      </td>
                  </tr>
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            </tbody>
        </table>
    </div>
@endsection
