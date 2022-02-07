@extends('layouts.admin')
@section('title') Редактировать профиль @endsection
@section('header')
<h1 class="h2">Редактировать профиль</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">

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
                   <th>Имя</th>
                   <th>Email</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
              @forelse($profiles as $profile)
                  <tr>
                      <td>{{ $profile->id }}</td>
                      <td>{{ $profile->name }}</td>
                      <td>{{ $profile->email }}</td>
                      <td>
                          <a href="{{ route('admin.profiles.edit', ['profile' => $profile->id]) }}">Ред.</a> &nbsp;
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