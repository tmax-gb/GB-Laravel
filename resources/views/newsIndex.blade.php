@extends('layouts.app')

@section('title-block')Новости@endsection

@section('content')<h1>Новости</h1>

<?php foreach($news as $newsItem): ?>
  <div>
	  <strong><a href="<?=route('newsShow', ['id' => $newsItem['id']])?>"><?=$newsItem['title']?></a></strong>
	  <p><?=$newsItem['description']?></p>
	  <em>Автор: <?=$newsItem['author']?></em>
	  <hr>
  </div>
<?php endforeach; ?>@endsection