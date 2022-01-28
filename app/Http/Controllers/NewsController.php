<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
	public function index()
	{
		$news = News::query()->select(News::$availableFields)->paginate(5);

		return view('news.index', [
			'newsList' => $news
		]);
	}

	public function show(News $news)
	{
		return view('news.show', [
			'news' => $news
		]);
	}
}
